<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "This will show the posts";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //This creates a new object that can be saved in the database.
        $post = new \App\Models\Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->created_by = 1;
        $post->save();
        return view('posts.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return "Will show the new post by id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //querying the database to pull the information -- Then you create a variable so that you can use a foreach loop in your view page for a table etc. 
        $post = \App\Models\Post::find($id);

        // returns                      This info on the view of edit. 
        return view('posts.edit')->with('posts', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = \App\Models\Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->created_by = 1;
        $post->save();
        return view('posts.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deletes the post and then redirects to the home/index view. 
        $posts = \App\Models\Posts::find($id);
        $posts = delete();
        return redirect()->action('postController@index');
    }
}
