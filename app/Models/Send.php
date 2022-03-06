<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    //relacion uno a uno inversa answer a contac

    public function contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }
}
