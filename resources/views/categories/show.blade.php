@extends('layouts.app')

@section('title', $category->name . ' - Category')

@section('content')
<div class="card">
    <h1 class="heading-1">{{ $category->name }}</h1>
    <p class="mb-6 text-gray-500">Articles in this category:</p>
    @if($articles->count())
        <ul class="space-y-4">
            @foreach($articles as $article)
                <li class="p-4 bg-gray-50 rounded-lg flex flex-col md:flex-row md:items-center md:justify-between shadow hover:shadow-lg transition">
                    <div>
                        <a href="{{ route('articles.show', $article) }}" class="text-xl font-semibold text-indigo-700 hover:text-cyan-500">{{ $article->title }}</a>
                        <div class="mt-2">
                            @foreach($article->tags as $tag)
                                <span class="inline-block bg-cyan-100 text-cyan-800 rounded px-2 py-1 mr-2">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <span class="text-xs text-gray-400 mt-3 md:mt-0">Published: {{ $article->created_at->format('Y-m-d') }}</span>
                </li>
            @endforeach
        </ul>
        <div class="mt-6">
            {{ $articles->links() }}
        </div>
    @else
        <p class="text-gray-500">There are no articles in this category yet.</p>
    @endif
</div>
@endsection