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
        'status'
    ];
    public function getsubject(){
        return $this->hasMany(Subject::class,'id','subject_id');
    }
}
