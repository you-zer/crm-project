@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Comments</h1>
        <a href="{{ route('comments.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">New Comment</a>
    </div>
    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="px-4 py-2 border">#</th>
                <th class="px-4 py-2 border">Client</th>
                <th class="px-4 py-2 border">Author</th>
                <th class="px-4 py-2 border">Content</th>
                <th class="px-4 py-2 border">Date</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
            <tr>
                <td class="px-4 py-2 border">{{ $comment->id }}</td>
                <td class="px-4 py-2 border">{{ $comment->client->last_name }} {{ $comment->client->first_name }}</td>
                <td class="px-4 py-2 border">{{ $comment->user->name }}</td>
                <td class="px-4 py-2 border">{!! Str::limit($comment->content, 50) !!}</td>
                <td class="px-4 py-2 border">{{ $comment->created_at->format('Y-m-d H:i') }}</td>
                <td class="px-4 py-2 border space-x-2">
                    <a href="{{ route('comments.show', $comment) }}" class="text-blue-600">View</a>
                    <a href="{{ route('comments.edit', $comment) }}" class="text-green-600">Edit</a>
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600" onclick="return confirm('Delete this comment?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">{{ $comments->links() }}</div>
</div>
@endsection
