<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder
{
	 public function run()
    {
    	

    	$faker = Faker\Factory::create();
        
    	for($i = 0; $i <= 10; $i++){
	        $user = new User();
	    	$user->email = $faker->email;
	    	$user->name = $faker->name;
	    	$user->password = $faker->password; //-- Mutator takes over the hash hash::make($value/password)
	    	$user->save();
    	}
    }
}