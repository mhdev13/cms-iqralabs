<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Users extends Authenticatable
{
   	protected $table = "users";

   	protected $fillable = [
        'fullname',
		'email',
		'password',

    ];

	public function group(){

		return $this->belongsToMany('App\Groups');
	
	}
}
