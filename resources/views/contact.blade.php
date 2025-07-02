@extends('layouts.app')

@section('title', 'Contact - CoolTech')

@section('content')
<div class="card">
    <h1 class="heading-1">Contact Us</h1>
    <form class="mt-4 space-y-4 max-w-lg" method="POST" action="{{ route('contact.submit') }}">
        @csrf
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Your Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Message</label>
            <textarea name="message" rows="4" class="w-full border rounded px-3 py-2" required></textarea>
        </div>
        <button type="submit" class="btn-cool">Send</button>
    </form>
</div>
@endsection