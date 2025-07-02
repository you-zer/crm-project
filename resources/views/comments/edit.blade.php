@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Comment #{{ $comment->id }}</h1>
    <form action="{{ route('comments.update', $comment) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-4">
            <label class="block font-medium" for="client_id">Client</label>
            <select disabled class="w-full border rounded px-3 py-2">
                <option>{{ $comment->client->last_name }} {{ $comment->client->first_name }}</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block font-medium" for="content">Content</label>
            <textarea id="content" name="content" rows="5" class="w-full border rounded px-3 py-2">{{ old('content',$comment->content) }}</textarea>
            @error('content')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update</button>
    </form>
</div>
@endsection
