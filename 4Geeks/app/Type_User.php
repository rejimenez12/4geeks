<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_User extends Model
{

	protected $table = 'type_user'; //nombre de la tabla en la bd

    protected $fillable = [
        'type'
    ];

    public function users(){
        
        return $this->hasMany('App\User','type_user_id','id');
    }
}
