<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Session;
use Mail;

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

		return view('pages.contact');
		
	}

	public function postContact(Request $request){

		//Validate data
		$this->validate($request,[
			'email' 	=> 'required|email',
			'subject'	=> 'min:3',
			'message'	=> 'min:10'
		]);

		$data = [
			'email' 		=> $request->email,
			'subject'		=> $request->subject,
			'bodyMessage'	=> $request->message
		];

		Mail::send('mail.contact',$data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('rodrigo.rod@here.com');
			$message->subject($data['subject']);			
		});

		Session::flash('success', 'Messege sent successfully');

		return redirect(url('/'));


	}

}

?>