<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use League\CommonMark\Exception\CommonMarkException;
use League\CommonMark\MarkdownConverter;

class PostController extends Controller
{
    public function __construct(private readonly MarkdownConverter $converter)
    {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::published()->latest('published_at')->get();
        $categories = Category::with('publishedPosts')->orderBy('name')->get();

        return view("post.index", ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("post.create", ['categories' => Category::orderBy('name')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $categories = [];

        foreach (explode(',', $validated['categories']) as $category) {
            $categories[] = Category::firstOrCreate(['name' => trim($category), 'slug' => Str::slug($category)])->id;
        }

        $slug = Str::slug($validated['title']);

        $post = new Post();
        $post->title = $validated['title'];
        $post->summary = $validated['summary'];
        $post->slug = $slug;
        $post->content = $validated['content'];
        $post->published_at = $validated['publish'] ? Carbon::now() : null;
        $post->user_id = auth()->user()->id;
        $post->save();
        $post->categories()->sync($categories);

        return redirect('thoughts/' . $post->slug);
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
        return view("post.edit", ['post' => $post, 'categories' => Category::orderBy('name')->get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $categories = [];
        foreach (explode(',', $validated['categories']) as $category) {
            $categories[] = Category::firstOrCreate(['name' => trim($category), 'slug' => Str::slug($category)])->id;
        }
        $post->title = $validated['title'];
        $post->summary = $validated['summary'];
        $post->content = $validated['content'];
        //        if ($post->published_at !== null && $validated['publish'] === null) {
        //            $post->published_at = null;
        //        } elseif ($post->published_at === null && $validated['publish'] !== null) {
        //            $post->published_at = Carbon::now();
        //        }
        $post->published_at = isset($validated['publish']) ? Carbon::now() : null;
        $post->save();
        $post->categories()->sync($categories);

        return redirect('thoughts/' . $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
