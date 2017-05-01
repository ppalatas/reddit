<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
	
	 public function run()
    {
    	$faker = Faker\Factory::create();

    	for($i = 0; $i <= 10; $i++){
	    	$post = new Post();
	        $post->title = $faker->sentence;
	        $post->content = $faker->text;
	        $post->created_by = \App\User::all()->random()->id;
	        $post->url = $faker->url;
	        $post->save();
    	}
    }
}