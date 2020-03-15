<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";

    protected $fillable = [
        'url',
		'category_name',
		'product_name',
		'image',
		'price',
		'description'
    ];
}
