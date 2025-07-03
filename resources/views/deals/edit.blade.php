@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Deal #{{ $deal->id }}</h1>
    <form action="{{ route('deals.update',$deal) }}" method="POST">@csrf @method('PUT')
        <div class="mb-4">
            <label class="block font-medium" for="client_id">Client</label>
            <select id="client_id" disabled class="w-full border rounded px-3 py-2">
                <option>{{ $deal->client->last_name }} {{ $deal->client->first_name }}</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block font-medium" for="title">Title</label>
            <input id="title" name="title" value="{{ old('title',$deal->title) }}" class="w-full border rounded px-3 py-2">
            @error('title')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium" for="amount">Amount</label>
            <input id="amount" name="amount" type="number" step="0.01" value="{{ old('amount',$deal->amount) }}" class="w-full border rounded px-3 py-2">
            @error('amount')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block font-medium" for="status">Status</label>
                <select id="status" name="status" class="w-full border rounded px-3 py-2">
                    @foreach(['pending'=>'Pending','won'=>'Won','lost'=>'Lost'] as $v=>$l)
                        <option value="{{ $v }}" @selected(old('status',$deal->status)==$v)>{{ $l }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-medium" for="closed_at">Closed At</label>
                <input id="closed_at" name="closed_at" type="date" value="{{ old('closed_at',$deal->closed_at?->format('Y-m-d')) }}" class="w-full border rounded px-3 py-2">
            </div>
        </div>
        <div class="mb-4">
            <label class="block font-medium" for="assigned_user_id">Assigned To</label>
            <select id="assigned_user_id" name="assigned_user_id" class="w-full border rounded px-3 py-2">
                @foreach(App\Models\User::all() as $u)
                    <option value="{{ $u->id }}" @selected(old('assigned_user_id',$deal->assigned_user_id)==$u->id)>{{ $u->name }}</option>
                @endforeach
            </select>
            @error('assigned_user_id')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update Deal</button>
    </form>
</div>
@endsection
