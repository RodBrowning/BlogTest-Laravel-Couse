<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Http\Requests;
use Session;

class PostController extends Controller
{
    // Just allow logged in users.

     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //Validate data

        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug'  => 'required|min:5|max:255|alpha_dash|unique:posts,slug',
            'body'  => 'required'
        ));
        
        //Store data

        $post = new Post;

        $post->title = $request->title;
        $post->slug  = $request->slug;
        $post->body  = $request->body;

        $post->save();

        //Set a success message

        Session::flash('success','Your post was saved successfully!');

        //Redirect to a page

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
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Assign the data from this $id to a variable array!!!
        $post = Post::find($id);

        //Resirect to edit view with the variable array.
        return view('posts.edit')->withPost($post);
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

        $post = Post::find($id);

        //Validate data
        if($request->slug == $post->slug){
            $this->validate($request, array(
            'title' => 'required|max:255',
            'body'  => 'required'
        ));    
        }else{
            $this->validate($request, array(
            'title' => 'required|max:255',
            'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body'  => 'required'
        ));
        }
        

        //store the data
        

        $post->title = $request->input('title');
        $post->slug  = $request->input('slug');
        $post->body  = $request->input('body');

        $post->save();

        //create success message
        Session::flash('success','Your post was updated successfully!');

        //Redirect to the show page
        return redirect()->route('posts.show', $post->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $post = Post::find($id);

        $post->delete();

        Session::flash('success','Your post was deleted successfully!!!');


        return redirect()->route('posts.index');
    }
}
