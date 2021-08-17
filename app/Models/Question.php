<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = ['id'];

    public function exam(){
        return $this->belongsTo(Exam::class);
    }

    public function  category(){
        return $this->belongsTo(Category::class);
    }

    public function options(){
        return $this->hasMany(Option::class);
    }
}
