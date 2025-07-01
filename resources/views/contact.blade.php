@extends('layouts.app')

@section('title', 'Contact | CoolTech')

@section('content')
<div class="container mx-auto py-20">
    <h1 class="text-4xl font-bold text-blue-700 mb-6">Contact Us</h1>
    <p class="text-lg text-gray-700 mb-6">Have questions? Reach out below!</p>
    
    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Display success message --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form class="max-w-xl mx-auto bg-white p-8 rounded shadow" method="POST" action="/contact">
        @csrf
        <div class="mb-4">
            <label class="block mb-2 font-bold text-gray-600">Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" value="{{ old('name') }}" required>
        </div>
        <div class="mb-4">
            <label class="block mb-2 font-bold text-gray-600">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ old('email') }}" required>
        </div>
        <div class="mb-4">
            <label class="block mb-2 font-bold text-gray-600">Message</label>
            <textarea name="message" class="w-full border rounded px-3 py-2" rows="4" required>{{ old('message') }}</textarea>
        </div>
        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">Send</button>
    </form>
</div>
@endsection