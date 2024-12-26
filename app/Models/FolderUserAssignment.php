<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolderUserAssignment extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'folder_user_assignments';

    // The attributes that are mass assignable.
    protected $fillable = [
        'folder_id',
        'user_id',
        'assigned_at',
    ];


    public function assignments123()
{
    return $this->hasMany(FolderUserAssignment::class, 'folder_id');
}


   
}
