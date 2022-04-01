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
        return $this->hasMany('App\Models\Option');
    }
}
