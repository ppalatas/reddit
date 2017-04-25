<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/sayhello/{name?}', function($name = 'World')
{
    return "Hello, $name!";

});


Route::get('/uppercase', function($word = 'world')
{
	return strtoupper($word);
});


Route::get('/increment', function($n = 1)
{
	return  $n + 1;
});

Route::get('/add', function($n =2, $number = 3)
{
	return $n + $number;

});

Route::get('/sayhello/{name}', function($name)
{
    if ($name == "Chris") {
        return Redirect::to('/');
    }

    $data = array('name' => $name);
    return view('my-first-view', $data);
});


Route::get('/rolldice', function($roll)
{
	$roll = random(1, 6);
	return "$roll";
});










