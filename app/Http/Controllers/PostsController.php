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

    public function __construct()
    {
        // we will force this authentication on everything except the index and show.
        //middleware is a laravel function that -- allows you to create an array that fires before the code in each function index... It allows you to not have to type if validated/logged in before each function you want to use.
        $this->middleware('auth', ['except' => ['index', 'show']]); 

        // if you only want specific items as password protected 
        // $this->middleware('auth', ['only' => ['create', 'store', 'update', 'edit, 'destroy']]);
    }


    public function index(Request $request)
    {
        //
        $posts = Post::with('user')->paginate(4);
        
        if ($request->has('search')) { // isset($_REQUEST['search'])
        // if ($request->search) {
            // SELECT * FROM posts
            // INNER JOIN users ON created_by = users.id
            // WHERE title LIKE '%value%'
            // OR name LIKE '%value%'
            $posts = Post::join('users', 'created_by', '=', 'users.id')
                ->where('title', 'LIKE', "%$request->search%")
                ->orWhere('name', 'LIKE', "%$request->search%")
                ->orderBy('created_by', 'ASC')
                ->paginate(4); // query builder
        } else {
            $posts = Post::orderBy('created_by', 'ASC')->paginate(4);  // SELECT * FROM posts OFFSET 0 LIMIT  // paginator
        }

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
            'content'=> 'required',
            'url'  => 'required',
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
        $post->created_by = $request->user()->id;
        $post->save();

      

        // redirect instead of view -- This is done because you are referencing only only table and index is listing 4 per page (as per the paginate).
        return redirect()->action('PostsController@index');
    }


    //Create a search bar for posts. 
    public function search()
    {

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


        // if($post->user->id != Auth::id()) {
        //     Session::flash('errorMessage', "Only the post author can edit post.");
        //     return redirect()->action('PostsController@index');
        // }

        // Log::info('The user edited a post.');
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
        $post->created_by = \Auth::id();
        $post->save();
        // Log::info("User id: $id updated some a post.");
        return redirect()->action('PostsController@index');
    }

 public function vote(Request $request)
    {
        $vote = new \App\Models\Votes;
        $vote->id = $request->title;
        $vote->user_id = $request->user_id;
        $vote->post_id = $request->post_id;
        $vote->save();

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
        return redirect()->action('PostsController@index');
    }
}
