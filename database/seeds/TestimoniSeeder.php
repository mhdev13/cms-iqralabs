<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('testimoni')->insert([
    			'fullname' => $faker->name,
    			'photo' => $faker->image(public_path('images'),400,300, null, false),
    			'comment' => $faker->sentence,
    			'from_who' => $faker->randomElement(['guru', 'murid']),
                'created_at' => \Carbon\Carbon::now(),
        	    'Updated_at' => \Carbon\Carbon::now(),
    		]);
 
    	}
    }
}
