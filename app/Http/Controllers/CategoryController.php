<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('publishedPosts')->orderBy('name')->get();

        return view("category.index", ['categories' => $categories]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = $category->load('publishedPosts');

        return view("category.show", ['category' => $category]);
    }
}
