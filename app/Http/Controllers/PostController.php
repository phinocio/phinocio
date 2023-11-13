<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\CommonMark\Exception\CommonMarkException;
use League\CommonMark\MarkdownConverter;

class PostController extends Controller
{
    public function __construct(private readonly MarkdownConverter $converter)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::whereNotNull('published_at')->latest('published_at')->get();
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
    public function show(Post $post): View
    {
        $post->load('categories');
        try {
            $post->content = $this->converter->convert($post->content);
            //            $post->content = $this->converter->convert(file_get_contents(resource_path('example.md')));
        } catch (CommonMarkException $e) {
            abort(500, $e->getMessage());
        }
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
