@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Deal Detail #{{ $deal->id }}</h1>
    <dl class="grid grid-cols-2 gap-4 bg-white border rounded p-4">
        <dt class="font-medium">Title</dt><dd>{{ $deal->title }}</dd>
        <dt class="font-medium">Amount</dt><dd>{{ number_format($deal->amount,2) }}</dd>
        <dt class="font-medium">Client</dt><dd>{{ $deal->client->last_name }} {{ $deal->client->first_name }}</dd>
        <dt class="font-medium">Status</dt><dd>{{ ucfirst($deal->status) }}</dd>
        <dt class="font-medium">Closed At</dt><dd>{{ $deal->closed_at?->format('Y-m-d') ?? '—' }}</dd>
        <dt class="font-medium">Assigned To</dt><dd>{{ $deal->assignedUser->name }}</dd>
    </dl>
    <div class="mt-4 space-x-2">
        <a href="{{ route('deals.edit',$deal) }}" class="px-4 py-2 bg-green-600 text-white rounded">Edit</a>
        <form action="{{ route('deals.destroy',$deal) }}" method="POST" class="inline">@csrf @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded" onclick="return confirm('Delete this deal?')">Delete</button>
        </form>
        <a href="{{ route('deals.index') }}" class="px-4 py-2 bg-gray-300 rounded">Back to List</a>
    </div>
</div>
@endsection
