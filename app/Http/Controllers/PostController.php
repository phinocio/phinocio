<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::whereNotNull('published_at')->orderBy("published_at", "desc")->with("categories")->get();
        $categories = Category::orderBy('name')->get();

        return view("post.index", ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'summary' => 'max:255',
            'content' => 'required',
            'publish' => 'string',
        ]);


        $slug = Str::slug($request['title']);

        $post = new Post();
        $post->title = $request['title'];
        $post->summary = $request['summary'];
        $post->slug = $slug;
        $post->content = $request['content'];
        $post->published_at = $request['publish'] ? Carbon::now() : null;
        $post->user_id = 1;
        $post->save();

        return redirect('thoughts/' . $slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return view("post.show", ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
