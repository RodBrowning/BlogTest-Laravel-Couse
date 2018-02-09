<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
Use App\Category;
use App\Http\Requests;
use Session;
use App\Tag;
use Purifier;

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
        $tags = Tag::orderBy('name','asc')->get();
        $categories = Category::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
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
        //dd($request);
        
        $this->validate($request, array(
            'title'         => 'required|max:255',
            'slug'          => 'required|min:6|max:255|alpha_dash|unique:posts,slug',
            'category_id'   => 'required|integer',
            'body'          => 'required'
        ));
        
        //Store data

        $post = new Post;

        $post->title        = $request->title;
        $post->slug         = $request->slug;
        $post->category_id  = $request->category_id;
        $post->body         = Purifier::clean($request->body);

        $post->save();


        $post->tags()->sync($request->tags, false);
        // Second parameter is optional, it not overwrite previous tags, which not makes sense to use it here but it's for learning purposes.

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

        //Categorias deven ser colocadas um array de key value par para o select box.
        $categories = Category::all();
        $cats = array();

        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tagsArray = [];

        foreach ($tags as $tag) {
            $tagsArray[$tag->id] = $tag->name;
        }

        //Resirect to edit view with the variable array.
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tagsArray);
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
            'title'         => 'required|max:255',
            'category_id'   => 'required|integer',
            'body'          => 'required'
        ));    
        }else{
            $this->validate($request, array(
            'title'         => 'required|max:255',
            'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'   => 'required|integer',
            'body'          => 'required'
        ));
        }
        

        //store the data
        

        $post->title        = $request->input('title');
        $post->slug         = $request->input('slug');
        $post->category_id  = $request->input('category_id');
        $post->body         = Purifier::clean($request->input('body'));

        $post->save();

        // this if sttatment is necessary or the aplication won't work.
        if (isset($request->tags)){
            $post->tags()->sync($request->tags);    
        }else{
            $post->tags()->sync(array());
        }
        

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
        $post->tags()->detach();

        $post->delete();

        Session::flash('success','Your post was deleted successfully!!!');


        return redirect()->route('posts.index');
    }
}
