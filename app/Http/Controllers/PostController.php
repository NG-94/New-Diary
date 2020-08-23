<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
// Controllern kan endast kommas åt om användaren är inloggad
        $this->middleware('auth');
    }
    public function index()
    {
        $idOfLoggedInUser = Auth::id();
        $allPosts = User::find($idOfLoggedInUser)->posts;
        return view('Post.index', compact('allPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('Post.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $newPost = new Post();
        $newPost->title = $request->title;
        $newPost->body = $request->body;
        $idOfLoggedInUser = Auth::id();
        $newPost->user_id = $idOfLoggedInUser;
        $newPost->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postToShow = Post::find($id);
        return view('Post.show', compact('postToShow'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postToUpdate = Post::find($id);
        return view('Post.edit', compact('postToUpdate'));
        
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
       $request->validate([
           'title' => 'required',
           'body' => 'required'
       ]);
        $postToUpdate = Post::find($id);
        
        
        $postToUpdate->title = $request->title;
        $postToUpdate->body = $request->body;
        
        $postToUpdate->update();
        return redirect('/');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postToDelete = Post::find($id);
        $postToDelete->delete();
        return redirect('/');
        
    }
}
