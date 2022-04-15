<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'title',
        'question',
        
    ];
    public function getoption(){
        return $this->hasMany(Option::class,'question_id','id');
    }
    public function getsubject(){
        return $this->hasMany(Subject::class,'id','subject_id');
    }
    public function getans(){
        return $this->hasMany(Answer::class,'question_id','id');
    }
    public function getanswer(){
        return $this->hasMany(Submission::class,'question_id','id');
    }
}
