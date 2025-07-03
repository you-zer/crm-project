@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Deals</h1>
        <a href="{{ route('deals.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">New Deal</a>
    </div>
    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="px-4 py-2 border">#</th>
                <th class="px-4 py-2 border">Title</th>
                <th class="px-4 py-2 border">Client</th>
                <th class="px-4 py-2 border">Amount</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Closed At</th>
                <th class="px-4 py-2 border">Assigned To</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deals as $deal)
            <tr>
                <td class="px-4 py-2 border">{{ $deal->id }}</td>
                <td class="px-4 py-2 border">{{ $deal->title }}</td>
                <td class="px-4 py-2 border">{{ $deal->client->last_name }} {{ $deal->client->first_name }}</td>
                <td class="px-4 py-2 border">{{ number_format($deal->amount,2) }}</td>
                <td class="px-4 py-2 border">{{ ucfirst($deal->status) }}</td>
                <td class="px-4 py-2 border">{{ $deal->closed_at?->format('Y-m-d') ?? '—' }}</td>
                <td class="px-4 py-2 border">{{ $deal->assignedUser->name }}</td>
                <td class="px-4 py-2 border space-x-2">
                    <a href="{{ route('deals.show',$deal) }}" class="text-blue-600">View</a>
                    <a href="{{ route('deals.edit',$deal) }}" class="text-green-600">Edit</a>
                    <form action="{{ route('deals.destroy',$deal) }}" method="POST" class="inline">@csrf @method('DELETE')
                        <button type="submit" class="text-red-600" onclick="return confirm('Delete this deal?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">{{ $deals->links() }}</div>
</div>
@endsection
