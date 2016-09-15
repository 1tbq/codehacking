<?php

namespace App;
use App\Role;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function role(){
//Since PHP 5.5, the class keyword is also used for class name resolution. instead of App/Role
        return $this->belongsTo('App\Role');
    }


    public function photo(){
        return $this->belongsTo('App\Photo');
    }



}
