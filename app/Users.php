<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
   	protected $table = "users";

   	protected $fillable = [
        'ic',
		'user_name',
		'gender',
		'join_date',
		'group',
		'remark',
		'image'
    ];

	public function group(){

		return $this->belongsToMany('App\Group');
	
	}
}
