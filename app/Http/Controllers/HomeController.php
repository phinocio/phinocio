<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::published()->latest("published_at")->get();
        $projects = Project::orderBy("title")->get();
        return view("home", ['posts' => $posts, 'projects' => $projects]);
    }
}
