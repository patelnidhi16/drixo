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
    public function getquestion(){
        return $this->hasMany('App\Models\Question');
    }
   
  

}
