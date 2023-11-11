<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::whereNotNull("published_at")->orderBy("published_at", "desc")->get();
        return view("home", ['posts' => $posts]);
    }
}
