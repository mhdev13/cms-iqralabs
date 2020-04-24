<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke table user
        DB::table('users')->insert([
        	'ic' => 1,
        	'user_name' => 'ahmadpato',
        	'gender' => 'male',
        	'join_date' => '11/11/2020',
        	'group' => '1',
        	// 'image' => 'ahmadpato',
        	'remark' => 'tess',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
    }
}
