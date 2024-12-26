<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;


use App\Models\ActivityLog;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use App\Models\FileManager;
use App\Models\FileData;
use App\Models\FolderUserAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use ZipArchive;

class EmpFileManagerController extends Controller
{
    public function index()
    {
        //
    }

    public function fileManagerss()
    {
        $title = 'File Manager';
        $employees = Employee::all();

        $folders = FileManager::where('parent_id', 0)
            ->where('delete_at', 0)
            ->whereHas('assignments123', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->get();

        return view('cs.file-manager.view', compact('title', 'employees', 'folders'));
    }


    public function storeFolder(Request $request)    
        {
             $request->validate([
                'name' => 'required|string|max:255',
                'parent_id' => 'nullable|exists:folders,id',
                'assigned_to' => 'nullable|exists:users,id',
            ]);
            
            $folderName = $request->name;
            $folderPath = $folderName;

            $existingFolder = FileManager::where('name', $folderName)
            ->where('parent_id', 0)
            ->where('delete_at', 0)
            ->exists();
    
            if ($existingFolder) {
                return back()->with('error', 'Folder name already exists. Please try another name.');
            }
           
            FileManager::create([
                'name' => $request->name,
                'parent_id' => 0,
                'created_by' => auth()->id(),
                'assigned_to' => $request->assigned_to ?? 0,
                'path' => $folderPath,
            ]);

            return back()->with('success', 'Folder created successfully!');
        }

        public function folderView($folderName, $folder_id)
        {
            $folder = FileManager::findOrFail($folder_id);
        
            $parentFolder = $folder->parent;
            $ancestors = $folder->getAncestors();        
        
            $folders = FileManager::where('parent_id', $folder_id)->where('delete_at', 0)->get();

            $FileData = FileData::where('parent_id', $folder_id)->where('delete_at', 0)->get();

            $parentFolderUrl = $folder->path ? str_replace('C:/xampp/htdocs/sharing/public/filemanager/', '', $folder->path) : '';
            $folderParentId = $folder->parent_id;
        
            return view('cs.file-manager.view1', [
                'title' => $folder->name,
                'folders' => $folders,
                'folder_id' => $folder_id,
                'ancestors' => $ancestors,
                'parentFolderUrl' => $parentFolderUrl,
                'folderParentId' => $folderParentId,
                'files' => $FileData,
            ]);
        }
        

        
        

        public function folderViewStore(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'parent_id' => 'nullable|exists:folders,id',
                'assigned_to' => 'nullable|exists:users,id',
            ]);
        
            $folderId = $request->input('folder_id'); 
            
           
            $folderName = $request->name;
            $folderNameUrl = $request->folderNameUrl;
            $folderPath = $folderNameUrl . '/' . $folderName;  

           
               $existingFolder = FileManager::where('name', $folderName)
                    ->where('parent_id', $folderId)
                    ->where('delete_at', 0)
                    ->exists();

                if ($existingFolder) {
                    return back()->with('error', 'Folder name already exists. Please try another name.');
                }

            $folderIdget = FileManager::where('id', $folderId)->pluck('id')->where('delete_at', 0)->first();
              
            FileManager::create([
                'name' => $folderName,
                'parent_id' =>  $folderIdget, 
                'created_by' => auth()->id(),
                'assigned_to' => 0,
                'path' => $folderPath,
            ]);
        
            return back()->with('success', 'Folder created successfully!');
        }

        public function folderDataStore(Request $request)
        {
            $request->validate([
                'folder_id' => 'required',
                'files.*' => 'required|file',
            ]);
        
            $folderId = $request->input('folder_id'); 
            $folderNameUrl = 'public/filemanager'; 
       
            if (!file_exists($folderNameUrl)) {
                mkdir($folderNameUrl, 0777, true);
            }
        
            if ($request->hasFile('files')) {
                $files = $request->file('files');
        
                foreach ($files as $file) {
                    $originalFileNameWithoutExt = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        
                    $fileExtension = $file->getClientOriginalExtension();
 
                    $uniqueFileName = $originalFileNameWithoutExt;
  
                    $counter = 1;
                    while (FileData::where('delete_at', 0)->where('name', $uniqueFileName . '.' . $fileExtension)->exists()) {
                        $uniqueFileName = $originalFileNameWithoutExt . '_' . $counter;
                        $counter++;
                    }
 
                    $uniqueStoredFileName = time() . '_' . uniqid() . '.' . $fileExtension;
 
                    $file->move($folderNameUrl, $uniqueStoredFileName);
 
                    FileData::create([
                        'name' => $uniqueFileName . '.' . $fileExtension, 
                        'fname' => $uniqueStoredFileName,         
                        'parent_id' => $folderId,
                        'uploaded_by' => auth()->id(),
                        'path' => $folderNameUrl . '/' . $uniqueStoredFileName,
                    ]);
                }
        
                return back()->with('success', 'Files uploaded successfully to the selected folder!');
            } else {
                return back()->withErrors(['error' => 'No files were uploaded.']);
            }
        }
        

        

    
         public function copyFile(Request $request)
            {
                $sourceId = $request->input('sourceId');
                $destinationFolderId = $request->input('destinationFolder');
                $typeId = $request->input('typeid'); // 1 for folder, 2 for file

                try {
                    if ($typeId == 1) {
                        $sourceFolder = FileManager::findOrFail($sourceId);

                        $newFolderName = $this->generateUniqueName($sourceFolder->name, $destinationFolderId, 'folder');

                        $newFolder = FileManager::create([
                            'name' => $newFolderName,
                            'parent_id' => $destinationFolderId,
                            'created_by' => auth()->id(),
                            'path' => rtrim($sourceFolder->path, '/') . '_' . $newFolderName,
                        ]);

                        $this->duplicateFilesInFolder($sourceFolder->id, $newFolder->id);

                        return back()->with('success', 'Folder copied successfully.');
                    } elseif ($typeId == 2) {
                        $sourceFile = FileData::findOrFail($sourceId);

                        $newFileName = $this->generateUniqueName($sourceFile->name, $destinationFolderId, 'file');

                        FileData::create([
                            'name' => $newFileName,
                            'parent_id' => $destinationFolderId,
                            'uploaded_by' => auth()->id(),
                            'path' => $sourceFile->path,
                        ]);

                        return back()->with('success', 'File copied successfully.');
                    } else {
                        return back()->withErrors(['error' => 'Invalid type specified.']);
                    }
                } catch (\Exception $e) {
                    return response()->json(['status' => 'error', 'message' => 'An error occurred: ' . $e->getMessage()]);
                }
            }


            private function generateUniqueName($baseName, $parentId, $type)
            {
                $existingNames = ($type === 'folder') 
                    ? FileManager::where('parent_id', $parentId)->where('delete_at', 0)->pluck('name')->toArray()
                    : FileData::where('parent_id', $parentId)->where('delete_at', 0)->pluck('name')->toArray();
            
                $newName = $baseName;
                $sequence = 1;
            
                if ($type === 'file') {
                    $extension = pathinfo($baseName, PATHINFO_EXTENSION);
                    $nameWithoutExtension = pathinfo($baseName, PATHINFO_FILENAME);
            
                    while (in_array($newName, $existingNames)) {
                        $newName = $nameWithoutExtension . '_' . $sequence . '.' . $extension;
                        $sequence++;
                    }
                } else {
                    while (in_array($newName, $existingNames)) {
                        $newName = $baseName . '_' . $sequence;
                        $sequence++;
                    }
                }
            
                return $newName;
            }
            

    private function duplicateFilesInFolder($sourceFolderId, $newFolderId)
    {
        $files = FileData::where('parent_id', $sourceFolderId)->where('delete_at', 0)->get();

        foreach ($files as $file) {
            $newFileName = $this->generateUniqueName($file->name, $newFolderId, 'file');

            FileData::create([
                'name' => $newFileName,
                'parent_id' => $newFolderId,
                'uploaded_by' => auth()->id(),
                'path' => $file->path,
            ]);
        }

        $subfolders = FileManager::where('parent_id', $sourceFolderId)->where('delete_at', 0)->get();

        foreach ($subfolders as $subfolder) {
            $newSubfolderName = $this->generateUniqueName($subfolder->name, $newFolderId, 'folder');

            $newSubfolder = FileManager::create([
                'name' => $newSubfolderName,
                'parent_id' => $newFolderId,
                'created_by' => auth()->id(),
                'path' => rtrim($subfolder->path, '/') . '_' . $newSubfolderName,
            ]);

            $this->duplicateFilesInFolder($subfolder->id, $newSubfolder->id);
        }
    }

 
    public function moveFile(Request $request)
    {
        $sourceId = $request->input('sourceId');
        $destinationFolderId = $request->input('destinationFolder');
        $typeId = $request->input('typeid'); // 1 for folder, 2 for file
    
        try {
            if ($typeId == 1) {
                $sourceFolder = FileManager::findOrFail($sourceId);
    
                $newFolderName = $this->generateUniqueName($sourceFolder->name, $destinationFolderId, 'folder');
    
                $sourceFolder->update([
                    'name' => $newFolderName,
                    'parent_id' => $destinationFolderId,
                    'path' => $this->updatePath($sourceFolder->path, $destinationFolderId, $newFolderName),
                ]);
    
                return back()->with('success', 'Folder moved successfully.');
            } elseif ($typeId == 2) {
                $sourceFile = FileData::findOrFail($sourceId);
    
                $newFileName = $this->generateUniqueName($sourceFile->name, $destinationFolderId, 'file');
    
                $sourceFile->update([
                    'name' => $newFileName,
                    'parent_id' => $destinationFolderId,
                ]);
    
                return back()->with('success', 'File moved successfully.');
            } else {
                return back()->withErrors(['error' => 'Invalid type specified.']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    
    private function updatePath($currentPath, $newParentId, $newName)
    {
        $parentFolder = FileManager::find($newParentId);
    
        if ($parentFolder) {
            return rtrim($parentFolder->path, '/') . '/' . $newName;
        }
    
        return $currentPath;
    }



        public function getChildFolders($parentId)
        {
            $allFolders = FileManager::where('parent_id', $parentId)->where('delete_at', 0)->get();
        
            $folders = [];
            foreach ($allFolders as $folder) {
                $folders[] = [
                    'id' => $folder->id,
                    'name' => $folder->name,
                ];
            }
        
            return response()->json([
                'status' => 'success',
                'folders' => $folders
            ]);
        }
        
        public function getFolderBreadcrumb($parentId)
        {
            $folder = FileManager::find($parentId);
        
            $ancestors = $folder->ancestors;
        
            return response()->json([
                'status' => 'success',
                'ancestors' => $ancestors
            ]);
        }

        public function renameFileOrFolder(Request $request)
            {
                $sourceId = $request->input('sourceId');
                $newName = $request->input('newName');
                $typeId = $request->input('typeid');

                try {
                    if ($typeId == 1) {
                        $folder = FileManager::findOrFail($sourceId);

                        $existingFolder = FileManager::where('name', $newName)
                            ->where('parent_id', $folder->parent_id)
                            ->where('delete_at', 0)
                            ->first();

                        if ($existingFolder) {
                            $counter = 1;
                            do {
                                $newName = $request->input('newName') . '-' . $counter;
                                $existingFolder = FileManager::where('name', $newName)
                                    ->where('parent_id', $folder->parent_id)
                                    ->where('delete_at', 0)
                                    ->first();
                                $counter++;
                            } while ($existingFolder);
                        }

                        $folder->update([
                            'name' => $newName,
                            'path' => rtrim(dirname($folder->path), '/') . '/' . $newName,
                        ]);

                        return back()->with('success', 'Folder renamed successfully.');
                    } elseif ($typeId == 2) {
                        $file = FileData::findOrFail($sourceId);

                        $extension = pathinfo($file->name, PATHINFO_EXTENSION);
                        $baseName = pathinfo($file->name, PATHINFO_FILENAME);
                        $newNameWithExtension = $newName . '.' . $extension;

                        $existingFile = FileData::where('name', $newNameWithExtension)
                            ->where('parent_id', $file->parent_id)
                            ->where('delete_at', 0)
                            ->first();

                        if ($existingFile) {
                            $counter = 1;
                            do {
                                $newNameWithExtension = $newName . '-' . $counter . '.' . $extension;
                                $existingFile = FileData::where('name', $newNameWithExtension)
                                    ->where('parent_id', $file->parent_id)
                                    ->where('delete_at', 0)
                                    ->first();
                                $counter++;
                            } while ($existingFile);
                        }

                        $file->update([
                            'name' => $newNameWithExtension,
                        ]);

                        return back()->with('success', 'File renamed successfully.');
                    } else {
                        return back()->withErrors(['error' => 'Invalid type specified.']);
                    }
                } catch (\Exception $e) {
                    return response()->json(['status' => 'error', 'message' => 'An error occurred: ' . $e->getMessage()]);
                }
            }


    public function deleteFileOrFolder(Request $request)
    {
        $sourceId = $request->input('sourceId');
        $typeId = $request->input('typeid'); // 1 for folder, 2 for file

        try {
            if ($typeId == 1) {
                $folder = FileManager::findOrFail($sourceId);

                $this->recursiveDeleteFolder($folder);

                return back()->with('success', 'Folder and all its contents deleted successfully.');
            } elseif ($typeId == 2) {
                $file = FileData::findOrFail($sourceId);

                $file->update([
                    'delete_at' => 1,
                ]);

                return back()->with('success', 'File deleted successfully.');
            } else {
                return back()->withErrors(['error' => 'Invalid type specified.']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    private function recursiveDeleteFolder($folder)
    {
        $folder->update(['delete_at' => 1]);

        $childFolders = FileManager::where('parent_id', $folder->id)->where('delete_at', 0)->get();

        foreach ($childFolders as $childFolder) {
            $this->recursiveDeleteFolder($childFolder); 
        }

        $files = FileData::where('parent_id', $folder->id)->where('delete_at', 0)->get();

        foreach ($files as $file) {
            $file->update(['delete_at' => 1]);
        }
    }


    public function downloadFile($fileId)
    {
        $file = FileData::findOrFail($fileId);

        if (!file_exists($file->path)) {
            return back()->withErrors(['error' => 'File not found.']);
        }

        return response()->download($file->path, $file->name);
    }

public function downloadFolder($folderId)
{
    $folder = FileManager::findOrFail($folderId);

    $zip = new ZipArchive();
    $zipFileName = public_path("temp/{$folder->name}.zip");
    if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
        $this->addFolderToZip($zip, $folder);

        $zip->close();

        return response()->download($zipFileName)->deleteFileAfterSend(true);
    } else {
        return back()->withErrors(['error' => 'Could not create ZIP file.']);
    }
}

private function addFolderToZip($zip, $folder)
{
    $files = FileData::where('parent_id', $folder->id)->where('delete_at', 0)->get();
    foreach ($files as $file) {
        $zip->addFile($file->path, $folder->name . '/' . $file->name);
    }

    $subfolders = FileManager::where('parent_id', $folder->id)->where('delete_at', 0)->get();
    foreach ($subfolders as $subfolder) {
        $this->addFolderToZip($zip, $subfolder);
    }
}


}
