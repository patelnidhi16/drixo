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
  
    public function getsubjectid(){
        return $this->hasMany(Question::class,'id','subject_id');
    }
  
    public function setSlugAttribute()
    {
    $this->attributes['slug'] = Str::slug($this->subject_name, "-");
    }
   

}
