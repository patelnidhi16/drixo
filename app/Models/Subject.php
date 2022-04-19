<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_name',
        'image',
    ];
  
    public function getsubjectid(){
        return $this->hasMany(Subject::class,'id','subject_name');
    }
  

}
