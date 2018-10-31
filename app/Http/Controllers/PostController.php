<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{

    //only authenticated person can get access
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
        $posts = Post::orderBy('id','desc')->paginate(5);

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
        //validate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slugs'  => 'required|alphadash|min:5|max:255',
            'body'  => 'required'
        ));

        //store in the database

        $post = new Post;

        $post->title = $request->title;
        $post->slugs = $request->slugs;
        $post->body = $request->body;

        $post->save();

        Session::flash('success','The blog was successfully uploaded');

        //redirect to the different page
        return redirect()->route('posts.show',$post->id);
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
        //find the post to edit and save it to the variable
        $post = Post::find($id);

        //return to the edit page and Pass the variable that is created
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
        //validate the data
        $post = Post::find($id);

        if($request->input('slugs') == $post->slugs){

            $this->validate($request, array(
            'title' => 'required|max:255',
            'body'  => 'required'
        ));}

        else{
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slugs' => 'required|alphadash|max:255|unique: posts,slug',
            'body'  => 'required'
        ));}

        //store the updated data to the database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slugs = $request->input('slugs');
        $post->body = $request->input('body');

        $post->save();

        //flash the message that data is saved
        Session::flash('success','The blog is successfully updated');

        //redirect to the new page
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
        //find the post to delete
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The blog is successfully deleted');

        return redirect()->route('posts.index');

    }
}
