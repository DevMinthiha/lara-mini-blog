<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(3);
        return view('index', ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'desc' => 'required',
            'image' => 'required'
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->desc = $request->desc;
        $image = $request->file('image');
        $imgName = $image->hashName();
        $image->storeAs('images', $imgName);
        $post->imgURL = $imgName;
        $post->save();
        return back()->with('success', 'Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments = $post->comments;
        return view('show', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->desc = $request->desc;
        $image = $request->file('image');
        if($image)
        {
            $imgName = $image->hashName();
            $image->storeAs('images', $imgName);
            $post->imgURL = $imgName;
        }
        $post->save();
        return to_route('post.index')->with('success', 'Post Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();
        Storage::delete("images/$post->imgURL");
        $post->delete();
        return to_route('post.index');
    }

    public function addComment(Request $request, $id)
    {
        $post = Post::find($id);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $post->comments()->save($comment);
        return to_route('post.show', $id);
    }

}
