@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Edit Role: {{ $user->name }}</h1>

    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')

        <label for="role" class="block mb-2">Select Role:</label>
        <select name="role" id="role" class="mb-4 border p-2">
            @foreach ($roles as $role)
                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
            <a href="{{ route('users.index') }}" class="ml-2 text-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
