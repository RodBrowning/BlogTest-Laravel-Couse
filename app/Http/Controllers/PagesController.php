<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller{

	public function getHome(){

		$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();		
		return view('pages.home')->withPosts($posts);
	}

	
	public function getAbout(){
		$first = 'Rodrigo';
		$last = 'Browning';

		$full = $first ." ". $last;
		$email = 'rod.browning@gmail.com';
		$data = [];
		$data['fullname'] = $full;
		$data['email'] = $email;

		return view('pages/about')->withData($data);
	}


	public function getContact(){
		$numA = 140;
		$numB = 30;
		$sum = $numA + $numB;
		return view('pages.contact')->with('total', $sum)->withA($numA)->withB($numB);
		
	}

}

?>