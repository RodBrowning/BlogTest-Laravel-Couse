<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Session;
use App\Http\Requests;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleWare('auth',['except'=>'store']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        
        $this->validate($request,[
            'name'  => 'required|min:3|max:255',
            'email' =>  'required|email',
            'comment' =>    'required|min:3'
        ]);

        $post = Post::find($id);

        $comment = new Comment;

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Your post was saved');

        return redirect()->route('blog.single',$post->slug);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comment.edit')->withComment($comment);
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
        $this->validate($request,['comment'=>'required|min:3']);

        $newComment = Comment::find($id);

        $newComment->comment = $request->comment;
        $newComment->update();

        Session::flash('success','Comment updates successfully');

        return redirect()->route('posts.show',$newComment->post_id);
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        return view('comment.delete')->withComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();

        Session::flash('success','Comment was deleted');

        return redirect()->route('posts.show',$post_id);
    }
}
