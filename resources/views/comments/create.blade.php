@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">New Comment</n    ></h1>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-medium" for="client_id">Client</label>
            <select id="client_id" name="client_id" class="w-full border rounded px-3 py-2">
                @foreach($clients as $c)
                    <option value="{{ $c->id }}" @selected(old('client_id')==$c->id)>
                        {{ $c->last_name }} {{ $c->first_name }}
                    </option>
                @endforeach
            </select>
            @error('client_id')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium" for="content">Content</label>
            <textarea id="content" name="content" rows="5" class="w-full border rounded px-3 py-2">{{ old('content') }}</textarea>
            @error('content')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Save</button>
    </form>
</div>
@endsection
