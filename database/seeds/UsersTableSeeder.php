<?php

use Illuminate\Database\Seeder;

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
    		'name' => 'Admin',
    		'role_code' => 'Admin',
    		'email' => 'admin@gmail.com',
    		'password' => bcrypt('admin@123')
    	]);
    }
}
