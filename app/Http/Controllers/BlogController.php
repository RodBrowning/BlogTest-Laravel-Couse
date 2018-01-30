<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Http\Requests;

class BlogController extends Controller
{
	//*Leva para a pagina de relação de posts for the user.
	public function getIndex(){


		$posts = Post::orderBy('created_at', 'desc')->paginate(10);
		setlocale(LC_ALL, config('locale'));
		return view('blog.index')->withPosts($posts);
	}

	
    public function getSingle($slug){
    	
    	setlocale(LC_ALL, config('locale'));
    	$post = Post::where('slug', '=', $slug)->first();

    	return view('blog.single')->withPost($post);

    }
}
