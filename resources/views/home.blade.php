@extends('layouts.app')

@section('title', 'Home | CoolTech')

@section('content')
<section class="bg-gradient-to-br from-blue-100 via-white to-blue-200 py-20">
    <div class="container mx-auto flex flex-col md:flex-row items-center">
        <!-- Hero Text -->
        <div class="w-full md:w-1/2 mb-10 md:mb-0 text-center md:text-left">
            <h1 class="text-5xl font-bold text-blue-700 mb-6">Welcome to CoolTech!</h1>
            <p class="text-xl text-gray-700 mb-6">Where tech meets the cool world of invention.</p>
            <a href="{{ url('/contact') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded shadow transition duration-300">Get Started</a>
        </div>
        <!-- Hero Image -->
        <div class="w-full md:w-1/2 flex justify-center">
            <img src="{{ asset('images/logo.png') }}" alt="Hero" class="rounded-lg shadow-lg max-h-80">
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-10">Our Features</h2>
        <div class="flex flex-wrap justify-center gap-8">
            <div class="bg-blue-100 p-6 rounded-lg shadow w-72 text-center">
                <h3 class="text-xl font-bold mb-2">Fast & Secure</h3>
                <p class="text-gray-600">Built with the latest Laravel & security best practices.</p>
            </div>
            <div class="bg-blue-100 p-6 rounded-lg shadow w-72 text-center">
                <h3 class="text-xl font-bold mb-2">Modern UI</h3>
                <p class="text-gray-600">Beautiful, responsive design using Tailwind CSS.</p>
            </div>
            <div class="bg-blue-100 p-6 rounded-lg shadow w-72 text-center">
                <h3 class="text-xl font-bold mb-2">Easy to Extend</h3>
                <p class="text-gray-600">Add features and scale with ease.</p>
            </div>
        </div>
    </div>
</section>
@endsection