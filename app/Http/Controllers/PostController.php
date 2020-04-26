<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * $posts variable store the all blog post of the database
         * all() static function of Model class take the all post of database as a object arry
         * 
         */
        
        $posts = Post::all();
        
        /**
         * Return a view and pass all data with the object variable
         * ""posts is folder name of view
         * and "index" is page name of posts folder
         */
        
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * 'posts' id folder name of view
         * and 'create' is page name of posts folder
         */
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
        /**
         * validation the data
         */
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required'
        ));
        
        /**
         * Store data in the database
         */
        
        /**
         * make the object of model class Post
         */
        $post = new Post;
        
        /**
         * $request is object parameter bring the all value of the form
         * $request->title take the value of title field of the form
         * $post->title save the value of the title in $post object in title index
         */
        $post->title = $request->title;
        $post->body = $request->body;
        
        /*
         * Save the all object index data $post to database table
         */
        $post->save();
        
        /**
         * flash() function of Session class take 2 parameters
         * first one is key and second one id value 
         */
        Session::flash('success', 'The blog post was successfully save!!');
        
        /**
         * Redirect to posts show page
         * posts:show is route name of postShow page it's call show($id) function and show the post according to id
         * $post->id bring the id of newly saved post
         * 
         */
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
         * show the single post which id we will pass in $id parameter
         * find() is static function of Model class
         * It find the post according to id number
         * and save the data of the row to object $post
         * we found column data in object index
         * $post->title e.t
         * 
         * with() take 2 parameter 
         * 2 parameter take the data of this function
         * 1 parameter take the all data of 2 parameter
         * and pass to the view
         * we found all dato of the $post object in view
         * $post->title e.t
         */
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
