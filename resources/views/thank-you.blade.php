@extends('layouts.app')

@section('content')
    <div class="container py-5 text-center">
        <h1 class="mb-4">Thank You!</h1>
        <p class="lead">Your message has been received. We appreciate your feedback and will get back to you soon.</p>
        <a href="{{ url('/') }}" class="btn btn-primary mt-3">Back to Home</a>
    </div>
@endsection