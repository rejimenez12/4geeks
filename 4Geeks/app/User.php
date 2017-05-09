<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users'; //nombre de la tabla en la bd

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type_user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {

        if ( !empty( $value ) ) {

            $this->attributes['password'] = bcrypt($value);

        }

    }

    /**
    *** user tiene muchos tipos de user
    *** contrario de 1:N
    **/

    public function typeUser(){

        return $this->belongsTo('App\Type_User', 'type_user_id','id');

    }
}
