<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function department()
    {
        return $this->belongsTo(Department::class , 'department_id' , 'id');
    } 
    
    public function bu()
    {
        return $this->belongsTo(NameOfTheBus::class , 'nameofthebu_id' , 'id');
    }
    
}
