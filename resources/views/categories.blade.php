@extends('layouts.app')

@section('content')
    <h1>Category: {{ $category->name }}</h1>
    @foreach($articles as $article)
        <div>
            <h2><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h2>
            <p>Tags:
                @foreach($article->tags as $tag)
                    <a href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a>@if(!$loop->last), @endif
                @endforeach
            </p>
            <hr>
        </div>
    @endforeach

    {{ $articles->links() }}
@endsection