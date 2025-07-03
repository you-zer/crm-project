@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">New Deal</h1>
    <form action="{{ route('deals.store') }}" method="POST">@csrf
        <div class="mb-4">
            <label class="block font-medium" for="client_id">Client</label>
            <select id="client_id" name="client_id" class="w-full border rounded px-3 py-2">
                @foreach($clients as $c)
                    <option value="{{ $c->id }}" @selected(old('client_id')==$c->id)>{{ $c->last_name }} {{ $c->first_name }}</option>
                @endforeach
            </select>
            @error('client_id')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium" for="title">Title</label>
            <input id="title" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2">
            @error('title')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium" for="amount">Amount</label>
            <input id="amount" name="amount" type="number" step="0.01" value="{{ old('amount') }}" class="w-full border rounded px-3 py-2">
            @error('amount')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium" for="status">Status</label>
            <select id="status" name="status" class="w-full border rounded px-3 py-2">
                @foreach(['pending'=>'Pending','won'=>'Won','lost'=>'Lost'] as $v=>$l)
                    <option value="{{ $v }}" @selected(old('status')==$v)>{{ $l }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block font-medium" for="closed_at">Closed At</label>
            <input id="closed_at" name="closed_at" type="date" value="{{ old('closed_at') }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block font-medium" for="assigned_user_id">Assigned To</label>
            <select id="assigned_user_id" name="assigned_user_id" class="w-full border rounded px-3 py-2">
                @foreach(App\Models\User::all() as $u)
                    <option value="{{ $u->id }}" @selected(old('assigned_user_id')==$u->id)>{{ $u->name }}</option>
                @endforeach
            </select>
            @error('assigned_user_id')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Create Deal</button>
    </form>
</div>
@endsection
