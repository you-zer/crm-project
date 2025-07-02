@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Comment #{{ $comment->id }}</h1>
    <dl class="grid grid-cols-2 gap-4 bg-white border rounded p-4">
        <dt class="font-medium">Client</dt><dd>{{ $comment->client->last_name }} {{ $comment->client->first_name }}</dd>
        <dt class="font-medium">Author</dt><dd>{{ $comment->user->name }}</dd>
        <dt class="font-medium">Content</dt><dd>{!! $comment->content !!}</dd>
        <dt class="font-medium">Date</dt><dd>{{ $comment->created_at->format('Y-m-d H:i') }}</dd>
    </dl>
    <div class="mt-4 space-x-2">
        <a href="{{ route('comments.edit',$comment) }}" class="px-4 py-2 bg-green-600 text-white rounded">Edit</a>
        <form action="{{ route('comments.destroy',$comment) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded" onclick="return confirm('Delete?')">Delete</button>
        </form>
        <a href="{{ route('comments.index') }}" class="px-4 py-2 bg-gray-300 rounded">Back</a>
    </div>
</div>
@endsection
