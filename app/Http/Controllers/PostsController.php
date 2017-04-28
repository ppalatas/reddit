<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Log;

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
        $posts = Post::paginate(4);
        
        
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        Log::info('The user just created a post.');
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


            //parameters for the inputs 
        $rules = array(

            'title'=> 'required|max:100',
            'url'  => 'required'
        );
        // if($post->save()){
        //     $request->session()flash('SuccessMessage', 'You just posted!');
        //     return redirect()->action('userController@show', $post->id);    
        // }
        
        $this->validate($request, $rules);


        //This creates a new object that can be saved in the database.
        $post = new \App\Models\Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = $request->url;
        $post->created_by = 1;
        $post->save();

        Log::info("User id : $id just saved their post.");

        // redirect instead of view -- This is done because you are referencing only only table and index is listing 4 per page (as per the paginate).
        return redirect()->action('PostsController@index');
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
        $post = Post::find($id);
        if(!$post){
            abort(404);
            Log::info("404 Error");
        }

        return view('posts.show')->with('post', $post);
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
        $post = Post::find($id);
        if(!$post){
            abort(404);
            Log::error("404 Error");
        }
        Log::info('The users edited a post.');
        // returns                      This info on the view of edit. 
        return view('posts.edit')->with('post', $post);
        
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
        $post = Post::find($id);
        if(!$post){
            abort(404);
            Log::error(" 404 Error");
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->created_by = 1;
        $post->save();
        Log::info("User id: $id updated some a post.");
        return redirect()->action('PostsController@show', $post->id);
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
        $post = Post::find($id);
        
        if(!$post){
            abort(404);
            Log::error("404 Error");
        }

        Log::info("User id : $id found post.");
        $posts = delete();
        Log::info("User id : $id deleted post.");
        return redirect()->action('postController@index');
    }
}
