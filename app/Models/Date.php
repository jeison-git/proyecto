<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacionuno a muchos...(una fecha pertenecen a muchas publicación)
    public function publications(){
        return $this->hasMany('App\Models\Publication');
    }

}
