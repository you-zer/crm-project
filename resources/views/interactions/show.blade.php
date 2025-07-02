@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Interaction #{{ $interaction->id }}</h1>
    <dl class="grid grid-cols-2 gap-4 bg-white border rounded p-4">
        <dt class="font-medium">Client</dt>
        <dd>{{ $interaction->client->last_name }} {{ $interaction->client->first_name }}</dd>
        <dt class="font-medium">User</dt>
        <dd>{{ $interaction->user->name }}</dd>
        <dt class="font-medium">Type</dt>
        <dd>{{ ucfirst($interaction->type) }}</dd>
        <dt class="font-medium">Content</dt>
        <dd>{{ $interaction->content }}</dd>
        <dt class="font-medium">Date</dt>
        <dd>{{ $interaction->created_at->format('Y-m-d H:i') }}</dd>
    </dl>

    <div class="mt-4 space-x-2">
        <a href="{{ route('interactions.edit', $interaction) }}" class="px-4 py-2 bg-green-600 text-white rounded">Edit</a>
        <form action="{{ route('interactions.destroy', $interaction) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded" onclick="return confirm('Delete this interaction?')">Delete</button>
        </form>
        <a href="{{ route('interactions.index') }}" class="px-4 py-2 bg-gray-300 rounded">Back</a>
    </div>
</div>
@endsection
