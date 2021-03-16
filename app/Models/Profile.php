<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    //relacion uno a uno inversa (perfil a usuario)

    public function user(){

        return $this->belongsTo('App\Models\User');

    }

}
