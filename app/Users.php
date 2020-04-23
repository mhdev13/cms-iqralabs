<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
   protected $table = "users";

    protected $fillable = [
        'ic',
		'user_name',
		'male|female',
		'joindate',
		'group',
		'image'
    ];
}
