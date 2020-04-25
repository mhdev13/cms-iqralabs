<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Users;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Users::class, function (Faker $faker) {
    return [
        'ic' => $faker->numberBetween($min = 1, $max = 10),
		'user_name' => $faker->word,
		'gender' => 'male',
		'join_date' => '11/11/2020',
		'group' => 'on',
		'image' => 'images/wizard-v3.jpg',
		'created_at' => Carbon::now(),
    	'updated_at' => Carbon::now()
    ];
});
