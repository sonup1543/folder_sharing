<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileData extends Model
{
    protected $table = 'file_datas';

    protected $fillable = [
        'name',        
        'parent_id',   
        'uploaded_by', 
        'path', 
        'fname',
        'delete_at',
    ];  



}
