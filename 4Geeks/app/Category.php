<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	
	protected $table = 'category'; //nombre de la tabla en la bd

    protected $fillable = [
        'category'
    ];



    public function notes(){
        
        return $this->hasMany('App\Note','category_id','id');
    }
}
