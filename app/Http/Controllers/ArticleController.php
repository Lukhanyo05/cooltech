<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // ADD THIS METHOD for home page with latest 5 articles
    public function home()
    {
        $articles = Article::with(['category', 'tags'])
            ->latest()
            ->take(5)
            ->get();

        return view('home', compact('articles'));
    }

    public function index()
    {
        $articles = Article::with('category', 'tags')->latest()->paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);
        $article = Article::create($data);
        $article->tags()->sync($request->input('tags', []));
        return redirect()->route('articles.index')->with('success', 'Article created!');
    }

    // FIX THIS METHOD - use ID instead of model binding for the required route
    public function show($id)
    {
        $article = Article::with(['category', 'tags'])->findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);
        $article->update($data);
        $article->tags()->sync($request->input('tags', []));
        return redirect()->route('articles.show', $article)->with('success', 'Article updated!');
    }

    public function destroy(Article $article)
    {
        $article->tags()->detach();
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted!');
    }
}