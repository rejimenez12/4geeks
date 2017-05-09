<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

	protected $table = 'note'; //nombre de la tabla en la bd

    protected $fillable = [
        'title', 'description', 'mark','category_id','user_id',
    ];

    public function user(){

        return $this->belongsTo('App\User', 'user_id','id');

    }

    public function category(){

        return $this->belongsTo('App\Category', 'category_id','id');

    }

}
