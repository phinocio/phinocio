<?php

namespace App\Http\Controllers;

class FeedController extends Controller
{
    public function atom()
    {
        return view('feed.atom');
    }
}
