<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getSingle($slugs){
    	//fetch the data from the database comparing slug
    	$post = Post::where('slugs','=',$slugs)->first();

    	//return to the view pages

    	return view('blog.single')->withPost($post);

    }
}
