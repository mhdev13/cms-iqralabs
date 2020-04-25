<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke table group
        DB::table('groups')->insert([
        	'group_name' => 'Jakarta',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        	'number_users' => 1,
        	'remark' => 'tes group'
        ]);
    }
}
