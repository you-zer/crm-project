@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">New Interaction</h1>
    <form action="{{ route('interactions.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="client_id" class="block font-medium">Client</label>
            <select id="client_id" name="client_id" class="w-full border rounded px-3 py-2">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" @selected(old('client_id') == $client->id)>{{ $client->last_name }} {{ $client->first_name }}</option>
                @endforeach
            </select>
            @error('client_id')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label for="type" class="block font-medium">Type</label>
            <select id="type" name="type" class="w-full border rounded px-3 py-2">
                @foreach(['call'=>'Call','email'=>'Email','meeting'=>'Meeting'] as $value=>$label)
                    <option value="{{ $value }}" @selected(old('type')==$value)>{{ $label }}</option>
                @endforeach
            </select>
            @error('type')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label for="content" class="block font-medium">Content</label>
            <textarea id="content" name="content" class="w-full border rounded px-3 py-2" rows="4">{{ old('content') }}</textarea>
            @error('content')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Save</button>
    </form>
</div>
@endsection
