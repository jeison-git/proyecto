<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $guarded   = ['id', 'status'];
    protected $withCount = ['users'];

    const SOLICITAR  = 1;
    const REVISION   = 2;
    const APROVADO   = 3;

    /* public function getRatingAttribute(){
        if($this->reviews_count){
            return round($this->reviews->avg('rating'),1);
        }else{
            return 5;
        }
    } */

    //Query Scopes // filtrado de categorias, años y idiomas (Ojo con la variable category_publication)
    public function scopeCategory_Publication($query, $category_publication_id){
        if($category_publication_id){
            return $query->where('category_publication_id', $category_publication_id);
        }
    }
    public function scopeDate($query, $date_id){
        if($date_id){
            return $query->where('date_id', $date_id);
        }
    }

    public function scopeLanguage($query, $language_id){
        if($language_id){
            return $query->where('language_id', $language_id);
        }
    }

    public function getRouteKeyName()
    {
       return "slug";
    }
    ////////////////////////////////////////////////////
    //relacion uno a uno
    public function check(){
        return $this->hasOne('App\Models\Check');
    }

    //relacion uno a muchos inversa (muchos cursos son de un profesor)
    public function editor(){

        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function category_publication(){
        return $this->belongsTo('App\Models\Category_Publication');
    }
    public function date(){
        return $this->belongsTo('App\Models\Date');
    }

    public function language(){
        return $this->belongsTo('App\Models\Language');
    }

    //relacion muchos a muchos (usuarios tienen muchos libros)
    public function users(){

        return $this->belongsToMany('App\Models\User');
    }

    //relacion uno a uno polimorfica

    public function image(){

        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function resource(){

        return $this->morphOne('App\Models\Resource', 'resourceable');
    }
}
