@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Clients</h1>
        <a href="{{ route('clients.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">New Client</a>
    </div>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="px-4 py-2 border">#</th>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Tags</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td class="px-4 py-2 border">{{ $client->id }}</td>
                <td class="px-4 py-2 border">
                    {{ $client->last_name }} {{ $client->first_name }}
                </td>
                <td class="px-4 py-2 border">{{ $client->email }}</td>
                <td class="px-4 py-2 border">{{ $client->status->name }}</td>
                <td class="px-4 py-2 border">
                    @foreach($client->tags as $tag)
                        <span class="inline-block px-2 py-1 bg-gray-200 text-sm rounded mr-1">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </td>
                <td class="px-4 py-2 border space-x-2">
                    <a href="{{ route('clients.show', $client) }}" class="text-blue-600">View</a>
                    <a href="{{ route('clients.edit', $client) }}" class="text-green-600">Edit</a>
                    <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600" onclick="return confirm('Delete this client?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $clients->links() }}
    </div>
</div>
@endsection
