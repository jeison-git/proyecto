<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacion uno a muchos inversa (reviews muchos comentarios vienen de un usuario)

    public function user(){

        return $this->belongsTo('App\Models\User');

    }

    public function course(){

        return $this->belongsTo('App\Models\Course');

    }

}
