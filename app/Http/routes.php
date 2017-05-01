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
Route::get('/', function(){
    return redirect('posts');
});

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




//CRUD OPS FOR POSTS
// Route::get('/posts', 'PostsController@index');
// Route::post('/posts/create', 'PostsController@create'); // shows form to create a post 
// Route::get('/posts', 'PostsController@store'); // will save the new post
// Route::get('/posts{posts}', 'PostsController@show'); // shows specific post by id 
// Route::post('/post{posts}/edit', 'PostsController@edit'); // edit the post 
// Route::post('/post{posts}', 'PostsController@update'); // update the post in the database 
// Route::delete('post{posts}', 'PostsController@destroy'); // deletes the posts


Route::resource('/posts', 'PostsController'); // A resource controller ^^^ Does the exact same thing as the CRUD operations above. 
Route::resource('students', 'StudentsController');

Route::resource('users', 'userController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');







