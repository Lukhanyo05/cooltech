@extends('layouts.app')

@section('title', $article->title . ' | CoolTech')

@section('content')
<div class="container mx-auto px-4 py-8">
    <article class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $article->title }}</h1>
            
            <div class="flex items-center text-gray-600 mb-6">
                <span class="mr-4">
                    Category: 
                    <a href="{{ route('category.show', $article->category->slug) }}" 
                       class="text-blue-600 hover:text-blue-800 font-medium">
                        {{ $article->category->name }}
                    </a>
                </span>
                <span>
                    Published: {{ $article->created_at->format('F j, Y') }}
                </span>
            </div>

            <div class="prose max-w-none mb-8">
                {!! $article->content !!}
            </div>

            @if($article->tags->count() > 0)
                <div class="border-t pt-6">
                    <h3 class="text-lg font-semibold mb-3">Tags:</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($article->tags as $tag)
                            <a href="{{ route('tag.show', $tag->slug) }}" 
                               class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm hover:bg-blue-200 transition">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </article>

    <div class="mt-8 text-center">
        <a href="{{ route('home') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded transition">
            Back to Home
        </a>
    </div>
</div>
@endsection