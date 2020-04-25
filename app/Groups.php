<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $table = "groups";

    protected $fillable = [
        'group_name'
    ];

    public function users(){
    	return $this->belongsToMany('App\Users');
    }
}
