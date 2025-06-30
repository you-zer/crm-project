{{-- resources/views/clients/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Client #{{ $client->id }}</h1>
    <dl class="grid grid-cols-2 gap-4 bg-white border rounded p-4">
        <dt class="font-medium">Name</dt><dd>{{ $client->last_name }} {{ $client->first_name }}</dd>
        <dt class="font-medium">Middle Name</dt><dd>{{ $client->middle_name }}</dd>
        <dt class="font-medium">Company</dt><dd>{{ $client->company }}</dd>
        <dt class="font-medium">Email</dt><dd>{{ $client->email }}</dd>
        <dt class="font-medium">Phone</dt><dd>{{ $client->phone }}</dd>
        <dt class="font-medium">Status</dt><dd>{{ $client->status->name }}</dd>
        <dt class="font-medium">Address</dt><dd>{{ $client->address }}</dd>
        <dt class="font-medium">Coordinates</dt>
            <dd>{{ $client->latitude }}, {{ $client->longitude }}</dd>
        <dt class="font-medium">Assigned To</dt>
            <dd>{{ $client->assignedUser?->name ?? '—' }}</dd>
        <dt class="font-medium">Created By</dt>
            <dd>{{ $client->creator?->name ?? '—' }}</dd>
    </dl>

    <div class="mt-4 space-x-2">
        <a href="{{ route('clients.edit', $client) }}" class="px-4 py-2 bg-green-600 text-white rounded">Edit</a>
        <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded"
                    onclick="return confirm('Delete this client?')">Delete</button>
        </form>
        <a href="{{ route('clients.index') }}" class="px-4 py-2 bg-gray-300 rounded">Back</a>
    </div>
</div>
@endsection
