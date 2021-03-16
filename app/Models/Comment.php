<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function commentable(){

        return $this->morphTo();
        
    }

  //relacion uno amuchos inversa

  public function user(){

      return $this->belongsTo('App\Models\User');
  } 
  
//relacion uno a muchos polimorfica

    public function comments(){

        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions(){

        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }

    
}
