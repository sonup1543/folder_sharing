@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">

<!-- Lightbox CSS -->
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">

<!-- PDF.js (for rendering PDFs) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

<!-- Lightbox JS -->
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>

<style>
.page-body-wrapper {
    padding-top: 59px !important;
}
.container, .container-fluid, .container-sm, .container-md, .container-lg, .container-xl {
    padding-right: 0px !important; 
    padding-left: 0px !important;
}
.btn-outline-primary {
    color: #2659c6;
    border-color: #2659c6;
}
.btn-outline-primary:hover {
    color: #fff;
    background-color: #2659c6;
    border-color: #2659c6;
}

.custom-breadcrumb {
    background-color: #f8f9fa;
    border-radius: 0.25rem;
    padding: 10px 15px;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.custom-breadcrumb .breadcrumb {
    margin-bottom: 0;
    background-color: transparent;
}

.custom-breadcrumb .breadcrumb-item a {
    text-decoration: none;
    color: #007bff; /* Folder link color */
    font-weight: 500;
}

.custom-breadcrumb .breadcrumb-item a:hover {
    color: #0056b3; /* Darker blue for hover effect */
    text-decoration: underline;
}

.custom-breadcrumb .breadcrumb-item.active {
    color: #28a745; /* Green for the active folder */
    font-weight: 600;
}


.custom-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
    content: '>';
    color: #6c757d; /* Separator color */
    font-weight: bold;
    margin-right: 0.5rem;
}

#pdfModal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.8);
    padding: 20px;
    z-index: 1000;
}

#pdfViewer {
    max-width: 100%;
    max-height: 80vh;
}


.custom-context-menu {
    position: absolute;
    display: none;
    z-index: 9999;
    background-color: #fff;
    border: 1px solid #ccc;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    padding: 10px;
    border-radius: 5px;
}

.custom-context-menu a {
    display: block;
    padding: 5px 10px;
    color: #007bff;
    text-decoration: none;
    cursor: pointer;
}

.custom-context-menu a:hover {
    background-color: #f8f9fa;
    color: #0056b3;
}
</style>

<!-- page content -->
<div class="content-wrapper">
   <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <div class="row mb-3">
                   <div class="col-md-8">
                       <h4 class="card-title">{{ $title ?? 'File Manager' }}</h4>
                   </div>
                   <div class="col-md-4 d-flex justify-content-end"></div>
                   <div class="col-md-8">
                       <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createFolderModal">
                           Create Folder
                       </button>
                       <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                           Upload
                       </button>
                       <!-- <button class="btn btn-outline-primary" onclick="showCopyModal({{ $folderParentId }})">Copy</button>
                       <button class="btn btn-outline-primary" onclick="showMoveModal({{ $folderParentId }})">Move</button> -->

                       @if($folderParentId != 0)
                           <a href="{{ route('file-manager.view', ['folders' => $parentFolderUrl, 'id' => $folderParentId]) }}" class="btn btn-outline-primary">
                               Back
                           </a>
                       @else
                           <a href="{{ route('file-manager.index') }}" class="btn btn-outline-primary">
                               Back
                           </a>
                       @endif
                   </div>
               </div>

               {{-- Breadcrumb Navigation --}}
               @if($ancestors->isNotEmpty())
                <nav aria-label="breadcrumb" class="custom-breadcrumb">
                    <ol class="breadcrumb">
                        <!-- File Manager root breadcrumb -->
                        <li class="breadcrumb-item">
                            <a href="{{ route('file-manager.index') }}">
                                <i class="bi bi-folder-fill text-primary"></i> File Manager
                            </a>
                        </li>
                       

                        @foreach($ancestors as $ancestor)
                            <?php
                            $anchorFolderurl = $ancestor->path ? str_replace('C:/xampp/htdocs/sharing/public/filemanager/', '', $ancestor->path) : null;
                            ?>
                            
                            @if($anchorFolderurl)
                                <li class="breadcrumb-item">
                                    <a href="{{ route('file-manager.view', ['folders' => $anchorFolderurl, 'id' => $ancestor->id]) }}">
                                        <i class="bi bi-folder-fill text-primary"></i> {{ $ancestor->name }}
                                    </a>
                                </li>
                            @endif
                        @endforeach


                        <!-- Current folder breadcrumb -->
                        <li class="breadcrumb-item active" aria-current="page">
                            <i class="bi bi-folder-fill text-success"></i> {{ $title ?? 'Current Folder' }}
                        </li>
                    </ol>
                </nav>
            @endif

            <div class="folder-list">
    <div class="row">
        @foreach($folders as $folder)
            <div class="col-md-2" style="padding: 15px;text-align: center;" oncontextmenu="showContextMenu(event, '{{ $folder->id }}', 1)">
                <a href="{{ $folder->id }}">
                    <img src="{{ asset('public/icon/folder.png') }}" alt="Folder Icon" width="65" height="65">
                    <br>
                    {{ $folder->name }}
                </a>
            </div>
        @endforeach

        @foreach($files as $file)
            @php
                $fileExtension = pathinfo($file->name, PATHINFO_EXTENSION);
                $relativePath = str_replace('C:/xampp/htdocs/sharing/', '', $file->path);
            @endphp
            <div class="col-md-2" style="padding: 15px;text-align: center;" oncontextmenu="showContextMenu(event, '{{ $file->id }}', 2)">
                @if($fileExtension === 'pdf')
                    <a href="{{ asset($relativePath) }}" target="_blank">
                        <img src="{{ asset('public/icon/pdf2.png') }}" alt="PDF" width="65" height="65">
                        <br>
                        {{ $file->name }}
                    </a>
                @elseif(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                    <a href="{{ asset($relativePath) }}" data-lightbox="file-{{ $file->id }}" data-title="{{ $file->name }}">
                        <img src="{{ asset($relativePath) }}" alt="{{ $file->name }}" width="65" height="65">
                        <br>
                        {{ $file->name }}
                    </a>
                @elseif(in_array($fileExtension, ['csv', 'xls', 'xlsx']))
                    <a href="{{ asset($relativePath) }}" target="_blank">
                        <img src="{{ asset('public/icon/excel.png') }}" alt="Excel/CSV" width="65" height="65">
                        <br>
                        {{ $file->name }}
                    </a>
                @elseif(in_array($fileExtension, ['doc', 'docx']))
                    <a href="{{ asset($relativePath) }}" target="_blank">
                        <img src="{{ asset('public/icon/file.png') }}" alt="Word" width="65" height="65">
                        <br>
                        {{ $file->name }}
                    </a>
                @elseif($fileExtension === 'txt')
                    <a href="{{ asset($relativePath) }}" target="_blank">
                        <img src="{{ asset('public/icon/file.png') }}" alt="Text File" width="65" height="65">
                        <br>
                        {{ $file->name }}
                    </a>
                @else
                    <a href="{{ asset($relativePath) }}" target="_blank">
                        <img src="{{ asset('public/icon/file.png') }}" alt="File" width="65" height="65">
                        <br>
                        {{ $file->name }}
                    </a>
                @endif
            </div>
        @endforeach
    </div>
</div>

                </div>
      </div>
   </div>
</div>

<!-- /page content -->

 <!--Create Folder Modal -->
<div class="modal fade" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">           
            <div class="modal-header">
                <h5 class="modal-title" id="createFolderModalLabel">Create Folder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createFolderForm" action="{{ route('file.storeFolder') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" name="folder_id" value="{{ $folder_id }}">
                        <input type="hidden" name="folderNameUrl" value="{{ $parentFolderUrl }}">
                        <label for="folderName" class="form-label">Folder Name:</label>
                        <input type="text" id="folderName" name="name" class="form-control" required>
                    </div>                  
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="createFolderForm" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>


<!--Create Upload File Modal -->
<div class="modal fade" id="uploadFileModal" tabindex="-1" aria-labelledby="uploadFileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">           
            <div class="modal-header">
                <h5 class="modal-title" id="uploadFileModalLabel">Upload Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createFolderForm1" action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <!-- Pass folder ID and URL -->
                        <input type="hidden" name="folder_id" value="{{ $folder_id }}">
                        <input type="hidden" name="folderNameUrl" value="{{ $parentFolderUrl }}">

                        <!-- File input allowing multiple file selection -->
                        <label for="files" class="form-label">Upload Files:</label>
                        <input type="file" id="files" name="files[]" class="form-control" multiple required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="createFolderForm1" class="btn btn-primary">Upload</button>
            </div>

        </div>
    </div>
</div>

<!-- Copy File Modal -->
<div class="modal fade" id="copyFolderModal" tabindex="-1" aria-labelledby="copyFolderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="copyFolderModalLabel">Select Folder to Copy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="copyFolderForm" action="{{ route('file.copy') }}" method="POST">
                    @csrf
                    <!-- Hidden fields to hold the source file/folder info -->
                    <input type="hidden" id="sourceId" name="sourceId">
                    <input type="hidden" id="typeid" name="typeid">
                    <input type="hidden" name="parentFolderUrl" value="{{ $parentFolderUrl }}">
                    <?php
                     $folderFullUrl = 'file-managers/' . rtrim($parentFolderUrl, '/') . '/' . ltrim($folder_id, '/');

                    ?>
                    <label for="destinationFolder" class="form-label">Select Destination Folder:</label>
                    <input type="text" id="destinationFolder" name="destinationFolder" class="form-control" value="{{$folderFullUrl}}" required>
                       
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="copyFolderForm" class="btn btn-primary">Copy</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="moveFolderModal" tabindex="-1" aria-labelledby="moveFolderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="moveFolderModalLabel">Select Folder to Move</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="moveFolderForm" action="{{ route('file.move') }}" method="POST">
                    @csrf
                    <!-- Hidden fields to hold the source file/folder info -->
                    <input type="hidden" id="sourceId1" name="sourceId">
                    <input type="hidden" id="typeid1" name="typeid">
                    <input type="hidden" name="parentFolderUrl" value="{{ $parentFolderUrl }}">
                    <?php
                     $folderFullUrl = 'file-managers/' . rtrim($parentFolderUrl, '/') . '/' . ltrim($folder_id, '/');

                    ?>
                    <label for="destinationFolder" class="form-label">Select Destination Folder:</label>
                    <input type="text" id="destinationFolder" name="destinationFolder" class="form-control" value="{{$folderFullUrl}}" required>
                       
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="moveFolderForm" class="btn btn-primary">Move</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="renameFolderModal" tabindex="-1" aria-labelledby="renameFolderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="renameFolderModalLabel">Select Folder and File to Rename</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="renameFolderForm" action="{{ route('file.rename') }}" method="POST">
                    @csrf
                    <!-- Hidden fields to hold the source file/folder info -->
                    <input type="hidden" id="sourceId2" name="sourceId">
                    <input type="hidden" id="typeid2" name="typeid">
                    <input type="hidden" name="parentFolderUrl" value="{{ $parentFolderUrl }}">
                    <?php
                     $folderFullUrl = 'file-managers/' . rtrim($parentFolderUrl, '/') . '/' . ltrim($folder_id, '/');

                    ?>
                    <label for="destinationFolder" class="form-label">Enter folder or File Name:</label>
                    <input type="text" id="newName" name="newName" class="form-control" required>
                       
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="renameFolderForm" class="btn btn-primary">Rename</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DeleteFolderModal" tabindex="-1" aria-labelledby="DeleteFolderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteFolderModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteFolderForm" action="{{ route('file.delete') }}" method="POST">
                    @csrf
                    <!-- Hidden fields to hold the source file/folder info -->
                    <input type="hidden" id="sourceId3" name="sourceId">
                    <input type="hidden" id="typeid3" name="typeid">
                    <input type="hidden" name="parentFolderUrl" value="{{ $parentFolderUrl }}">
                    <p class="fs-5 text-center">
                        Are you sure you want to delete this file or folder? This action cannot be undone.
                    </p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="deleteFolderForm" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>







<!-- Move File Modal (similar to Copy File Modal) -->



@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
@section('script')
<script>
    new DataTable('#employee_datatable');
</script>
<script>
    function openPdf(pdfUrl) {
    // Show the PDF Modal
    var modal = document.getElementById('pdfModal');
    modal.style.display = 'block';

    // Use PDF.js to load and render the PDF
    var canvas = document.getElementById('pdfViewer');
    var context = canvas.getContext('2d');

    // Fetch the PDF document
    pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
        pdf.getPage(1).then(function(page) {
            var viewport = page.getViewport({ scale: 1 });
            canvas.width = viewport.width;
            canvas.height = viewport.height;

            page.render({
                canvasContext: context,
                viewport: viewport
            });
        });
    });
}

// Close the modal when clicked outside
window.onclick = function(event) {
    var modal = document.getElementById('pdfModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}
</script>

<script>
    document.addEventListener('click', function () {
        const contextMenu = document.getElementById('contextMenu');
        if (contextMenu) contextMenu.style.display = 'none';
    });

    function showContextMenu(event, filePath, type) {
        event.preventDefault();

        // Create or reference the context menu
        let contextMenu = document.getElementById('contextMenu');
        if (!contextMenu) {
            contextMenu = document.createElement('div');
            contextMenu.id = 'contextMenu';
            contextMenu.className = 'custom-context-menu';
            document.body.appendChild(contextMenu);
        }

        // Set the content of the context menu
        contextMenu.innerHTML = `
            <a href="#" onclick="downloadFileOrFolder('${filePath}', ${type})">Download</a>
            <a href="#" onclick="showCopyModal('${filePath}', ${type})">Copy</a>
            <a href="#" onclick="handleMove('${filePath}', ${type})">Move</a>
            <a href="#" onclick="handleRename('${filePath}', ${type})">Rename</a>
            <a href="#" onclick="handleDelete('${filePath}', ${type})">Delete</a>
        `;

        // Position the context menu
        contextMenu.style.display = 'block';
        contextMenu.style.left = `${event.pageX}px`;
        contextMenu.style.top = `${event.pageY}px`;
    }

    function showCopyModal(filePath, type) {
        document.getElementById('sourceId').value = filePath;
        document.getElementById('typeid').value = type;

        // Show the modal
        $('#copyFolderModal').modal('show');
    }

    function handleMove(filePath, type) {
        document.getElementById('sourceId1').value = filePath;
        document.getElementById('typeid1').value = type;

        $('#moveFolderModal').modal('show');
    }

    function handleCopy(filePath, type) {
        showCopyModal(filePath, type);
    }

    function handleRename(filePath, type) {
       document.getElementById('sourceId2').value = filePath;
        document.getElementById('typeid2').value = type;

        // Show the modal
        $('#renameFolderModal').modal('show');
    }

    function handleDelete(filePath, type) {
       document.getElementById('sourceId3').value = filePath;
        document.getElementById('typeid3').value = type;

        // Show the modal
        $('#DeleteFolderModal').modal('show');
    }

    function openFileOrFolder(filePath, type) {
        if (type === 2) {
            // If it's a file, open in a new tab
            window.open(`/files/${filePath}`, '_blank');
        } else if (type === 1) {
            // If it's a folder, open in the same tab
            window.location.href = `/folders/${filePath}`;
        } else {
            alert('Invalid type');
        }
    }

    function downloadFileOrFolder(filePath, type) {
    if (type === 2) {
        window.location.href = "{{ route('file.download', ':filePath') }}".replace(':filePath', filePath);
    } else if (type === 1) {
        window.location.href = "{{ route('folder.download', ':filePath') }}".replace(':filePath', filePath);
    }
}


</script>

<script>
function loadChildFolders(parentId, element) {
    // Get the folder URL from the clicked element's folderurl attribute
    const folderUrl = element.getAttribute('folderurl');

    // Generate the route URL dynamically using the route name
    const url = "{{ route('file.childname', ['parentId' => '__parentId__']) }}".replace('__parentId__', parentId);

    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Get the destination folder dropdown element
            const dropdown = document.getElementById('destinationFolder');
            dropdown.innerHTML = ''; // Clear the previous options

            // Populate the dropdown with the child folders
            data.folders.forEach(folder => {
                const option = document.createElement('option');
                option.value = folder.id;
                option.text = folder.name;
                dropdown.appendChild(option);
            });

            // Update the breadcrumb with the clicked folder
            updateBreadcrumb(parentId, folderUrl, data.folders);
        } else {
            alert('Error loading child folders');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to load child folders');
    });
}

function updateBreadcrumb(parentId, folderUrl, childFolders) {
    // Generate the route URL for fetching the breadcrumb data
    const url = "{{ route('file.breadcrumn', ['parentId' => '__parentId__']) }}".replace('__parentId__', parentId);

    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            const breadcrumb = document.querySelector('.breadcrumb');
            breadcrumb.innerHTML = ''; // Clear the previous breadcrumb

            // Rebuild breadcrumb based on ancestors
            data.ancestors.forEach(ancestor => {
                const listItem = document.createElement('li');
                listItem.className = 'breadcrumb-item';
                listItem.innerHTML = `<a href="javascript:void(0);" onclick="loadChildFolders('${ancestor.id}', this)">
                                        <i class="bi bi-folder-fill text-primary"></i> ${ancestor.name}
                                      </a>`;
                breadcrumb.appendChild(listItem);
            });

            // Add the selected folder as the last breadcrumb item
            const selectedFolderItem = document.createElement('li');
            selectedFolderItem.className = 'breadcrumb-item active';
            selectedFolderItem.innerHTML = `<i class="bi bi-folder-fill text-primary"></i> ${childFolders[0].name}`;
            breadcrumb.appendChild(selectedFolderItem);

            // Update the destination folder dropdown with the selected folder's child folders
            updateFolderDropdown(childFolders[0].id);
        } else {
            alert('Error loading breadcrumb');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to load breadcrumb');
    });
}

function updateFolderDropdown(parentId) {
    // Generate the route URL dynamically using the route name
    const url = "{{ route('file.childname', ['parentId' => '__parentId__']) }}".replace('__parentId__', parentId);

    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            const dropdown = document.getElementById('destinationFolder');
            dropdown.innerHTML = ''; // Clear previous options

            data.folders.forEach(folder => {
                const option = document.createElement('option');
                option.value = folder.id;
                option.text = folder.name;
                dropdown.appendChild(option);
            });
        } else {
            alert('Error loading child folders');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to load child folders');
    });
}

function selectFolderFromDropdown(selectedFolderId) {
    // Get the selected folder's name
    const selectedFolder = document.querySelector(`#destinationFolder option[value="${selectedFolderId}"]`);
    const folderName = selectedFolder ? selectedFolder.textContent : '';

    // Add the selected folder to the breadcrumb
    const breadcrumb = document.getElementById('breadcrumb');
    
    // Create new breadcrumb item for the selected folder
    const listItem = document.createElement('li');
    listItem.classList.add('breadcrumb-item', 'active');
    listItem.innerHTML = `<i class="bi bi-folder-fill text-primary"></i> ${folderName}`;

    // Append the new breadcrumb item
    breadcrumb.appendChild(listItem);

    // Optionally, update the folder URL or load child folders if necessary
    // You can create a function for loading child folders as well
    loadChildFolders(selectedFolderId); // Assuming this function exists
}


</script>


@endsection