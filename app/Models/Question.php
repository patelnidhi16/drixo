<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'title',
        'question',
        'slug',
        'start_time',
        'end_time'
        
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
    public function setSlugAttribute()
    {
    $this->attributes['slug'] = Str::slug($this->title, "-");
    }
}
