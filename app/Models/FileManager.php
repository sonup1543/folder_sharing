<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class FileManager extends Model
{
    protected $table = 'file_managers';

    protected $fillable = [
        'name',        
        'parent_id',   
        'created_by',  
        'assigned_to', 
        'path', 
        'delete_at',
    ];

    public function parent()
    {
        return $this->belongsTo(FileManager::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(FileManager::class, 'parent_id');
    }

    public function getAncestors()
{
    $ancestors = [];
    $parent = $this->parent;

    // Loop through ancestors
    while ($parent) {
        $ancestors[] = $parent;
        $parent = $parent->parent; 
    }

    // Add "File Manager" as the root folder if it has no parent
    if (empty($ancestors)) {
        $ancestors[] = (object) ['name' => 'File Manager', 'id' => 0, 'path' => ''];
    }

    return collect($ancestors)->reverse();
}

public function assignments123()
{
    return $this->hasMany(FolderUserAssignment::class, 'folder_id');
}




}
