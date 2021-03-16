<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audiencie extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacion uno a muchos inversa

    public function course(){

        return $this->belongsTo('App\Models\Course');

    }
}
