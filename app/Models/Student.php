<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_id',
        'subject_id',
        'title',
        'status',
        'start_time',
        'end_time',
        'slug'
    ];
    public function getsubject(){
        return $this->hasMany(Subject::class,'id','subject_id');
    }
    public function gettime(){
        return $this->hasMany(Question::class,'subject_id','subject_id');
    }
    public function setSlugAttribute()
    {
    $this->attributes['slug'] = Str::slug($this->title, "-");
    }
    
}
