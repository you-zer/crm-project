@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Interactions</h1>
        <a href="{{ route('interactions.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">New Interaction</a>
    </div>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Client</th>
                <th class="px-4 py-2 border">User</th>
                <th class="px-4 py-2 border">Type</th>
                <th class="px-4 py-2 border">Content</th>
                <th class="px-4 py-2 border">Date</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($interactions as $interaction)
            <tr>
                <td class="px-4 py-2 border">{{ $interaction->id }}</td>
                <td class="px-4 py-2 border">{{ $interaction->client->last_name }} {{ $interaction->client->first_name }}</td>
                <td class="px-4 py-2 border">{{ $interaction->user->name }}</td>
                <td class="px-4 py-2 border">{{ ucfirst($interaction->type) }}</td>
                <td class="px-4 py-2 border">{{ Str::limit($interaction->content, 50) }}</td>
                <td class="px-4 py-2 border">{{ $interaction->created_at->format('Y-m-d H:i') }}</td>
                <td class="px-4 py-2 border space-x-2">
                    <a href="{{ route('interactions.show', $interaction) }}" class="text-blue-600">View</a>
                    <a href="{{ route('interactions.edit', $interaction) }}" class="text-green-600">Edit</a>
                    <form action="{{ route('interactions.destroy', $interaction) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $interactions->links() }}
    </div>
</div>
@endsection
