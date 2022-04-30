<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_name',
        'image',
        'slug'
    ];
  
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
   

}
