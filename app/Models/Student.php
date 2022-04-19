<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_id',
        'subject_id',
        'title',
        'status',
        'start_time',
        'end_time'
    ];
    public function getsubject(){
        return $this->hasMany(Subject::class,'id','subject_id');
    }
}
