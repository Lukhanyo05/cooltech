<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $articles = $category->articles()->with('tags')->latest()->paginate(10);
        return view('categories.show', compact('category', 'articles'));
    }
}