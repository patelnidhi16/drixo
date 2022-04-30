<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Result extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'subject',
        'title',
        'result',
        'status',
        'total_mark',
        'slug'
    ];
    public function setSlugAttribute()
    {
    $this->attributes['slug'] = Str ::slug($this->title, "-");
    }
    public function getslug(){
        return $this->hasMany(Subject::class,'subject_name','subject');
    }
   
}