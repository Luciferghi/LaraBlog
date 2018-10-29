<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller{

	public function getIndex(){

		$posts = Post::orderBy('created_at','desc')->limit(4)->get();
		return view('pages.welcome')->withPosts($posts);


	}

	public function getAbout(){
		

		return view('pages.about');

	}

	public function getContact(){
		$fullname = 'Nitish Ghimire';
		$email = 'nitish.ghimire1@Gmail.com';

		$data = [];
		$data['fullname'] = $fullname;
		$data['email'] = $email;
		return view('pages.contact')->withData($data);


	}

}