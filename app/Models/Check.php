<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'publication_id'];

    //relacion uno a uno inversa observer a course

    public function publication()
    {
        return $this->belongsTo('App\Models\Publication');
    }
}
