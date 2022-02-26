<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Publication extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacionuno a muchos...(muchas categorias pertenecen a una publicación)
    public function publications(){
        return $this->hasMany('App\Models\Publication');
    }

}
