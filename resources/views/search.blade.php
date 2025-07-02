@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Search</h1>
    @if (session('error'))
        <div style="color:red;">{{ session('error') }}</div>
    @endif

    <form method="GET" action="{{ route('search.article') }}" style="margin-bottom: 20px;">
        <label>Search by Article ID:</label>
        <input type="number" name="article_id" placeholder="Enter Article ID" required>
        <button type="submit">Search Article</button>
    </form>

    <form method="GET" action="{{ route('search.category') }}" style="margin-bottom: 20px;">
        <label>Search by Category ID:</label>
        <input type="number" name="category_id" placeholder="Enter Category ID" required>
        <button type="submit">Search Category</button>
    </form>

    <form method="GET" action="{{ route('search.tag') }}">
        <label>Search by Tag ID:</label>
        <input type="number" name="tag_id" placeholder="Enter Tag ID" required>
        <button type="submit">Search Tag</button>
    </form>
</div>
@endsection