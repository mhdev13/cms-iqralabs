<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id');

    	for($i = 1; $i <= 50; $i++){

    	    // insert data ke table users menggunakan Faker
    		DB::table('users')->insert([
    			'fullname' => $faker->name,
    			'no_identity' => $faker->randomDigit,
    			'gender' => $faker->randomElement(['male', 'female']),
    			'religion' => $faker->randomElement(['muslim', 'non_muslim']),
                'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
    			'email' => $faker->safeEmail,
    			'education' => $faker->randomElement(['sd','smp','sma','s1','other']),
    			'address' => $faker->address,
                'phone_number' => $faker->phoneNumber,
                'status' => $faker->randomElement(['active', 'pending','inactive']),
                'created_at' => $faker->dateTimeThisMonth(),
    		]);

    	}
    }
}
