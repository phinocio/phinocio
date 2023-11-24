<?php

namespace App\Http\Controllers;

use App\Models\Post;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'password.confirm']);
    }

    public function index()
    {
        $posts = Post::with('categories')->latest('updated_at')->get();

        return view('admin.index', ['posts' => $posts]);
    }
}
