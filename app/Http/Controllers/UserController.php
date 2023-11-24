<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'password.confirm']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');
    }
}
