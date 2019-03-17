<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
       		'full_name' => 'Administrator',
       		'username' => 'admin',
       		'password' => bcrypt('4dM1nCm5'),
       		'level_id' => 1
       ]); 
    }
}
