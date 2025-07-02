@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Interaction #{{ $interaction->id }}</h1>
    <form action="{{ route('interactions.update', $interaction) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-4">
            <label for="client_id" class="block font-medium">Client</label>
            <select id="client_id" name="client_id" class="w-full border rounded px-3 py-2" disabled>
                <option>{{ $interaction->client->last_name }} {{ $interaction->client->first_name }}</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="type" class="block font-medium">Type</label>
            <select id="type" name="type" class="w-full border rounded px-3 py-2">
                @foreach(['call'=>'Call','email'=>'Email','meeting'=>'Meeting'] as $value=>$label)
                    <option value="{{ $value }}" @selected(old('type',$interaction->type)==$value)>{{ $label }}</option>
                @endforeach
            </select>
            @error('type')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label for="content" class="block font-medium">Content</label>
            <textarea id="content" name="content" class="w-full border rounded px-3 py-2" rows="4">{{ old('content',$interaction->content) }}</textarea>
            @error('content')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update</button>
    </form>
</div>
@endsection
