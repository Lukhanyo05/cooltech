@extends('layouts.app')

@section('title', 'Contact Submissions | Admin')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">Contact Submissions</h1>
    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Message</th>
                <th class="px-4 py-2 border">Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td class="px-4 py-2 border">{{ $contact->name }}</td>
                <td class="px-4 py-2 border">{{ $contact->email }}</td>
                <td class="px-4 py-2 border">{{ $contact->message }}</td>
                <td class="px-4 py-2 border">{{ $contact->created_at->format('Y-m-d H:i') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $contacts->links() }}
    </div>
</div>
@endsection