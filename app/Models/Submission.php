<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'question_id',
        'subject',
        'title',
        'answer',
    ];
    public function getanswer(){
        return $this->hasMany(Answer::class,'id','question_id');
    }
}
