<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show()
    {
        return view('search');
    }

    public function searchArticle(Request $request)
    {
        $id = $request->input('article_id');
        if ($id) {
            return redirect()->route('articles.show', ['article' => $id]);
        }
        return redirect()->route('search.show')->with('error', 'Please enter an article ID.');
    }

    public function searchCategory(Request $request)
    {
        $id = $request->input('category_id');
        if ($id) {
            return redirect()->route('categories.show', ['category' => $id]);
        }
        return redirect()->route('search.show')->with('error', 'Please enter a category ID.');
    }

    public function searchTag(Request $request)
    {
        $id = $request->input('tag_id');
        if ($id) {
            return redirect()->route('tags.show', ['tag' => $id]);
        }
        return redirect()->route('search.show')->with('error', 'Please enter a tag ID.');
    }
}