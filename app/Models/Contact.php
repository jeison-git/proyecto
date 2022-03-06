<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    const BORRADOR   = 1;
    const RESPONDIDO = 2;

    public $guarded =  ['id', 'created_at', 'updated_at'];

    //relacion uno a uno

    public function send(){
        return $this->hasOne('App\Models\Send');
    }
}
