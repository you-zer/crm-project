@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Task #{{ $task->id }}</h1>
    <dl class="grid grid-cols-2 gap-4 bg-white border rounded p-4">
        <dt class="font-medium">Title</dt><dd>{{ $task->title }}</dd>
        <dt class="font-medium">Description</dt><dd>{{ $task->description }}</dd>
        <dt class="font-medium">Client</dt><dd>{{ $task->client->last_name }} {{ $task->client->first_name }}</dd>
        <dt class="font-medium">Assigned To</dt><dd>{{ $task->assignedUser->name }}</dd>
        <dt class="font-medium">Status</dt><dd>{{ ucfirst($task->status) }}</dd>
        <dt class="font-medium">Due Date</dt><dd>{{ $task->due_date->format('Y-m-d H:i') }}</dd>
        <dt class="font-medium">Recurrence</dt><dd>{{ ucfirst($task->recurrence_type) }} every {{ $task->recurrence_interval }}</dd>
        <dt class="font-medium">Repeat Until</dt><dd>{{ $task->recurrence_until?->format('Y-m-d') }}</dd>
    </dl>
    <div class="mt-4 space-x-2">
        <a href="{{ route('tasks.edit',$task) }}" class="px-4 py-2 bg-green-600 text-white rounded">Edit</a>
        <form action="{{ route('tasks.destroy',$task) }}" method="POST" class="inline">@csrf @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded" onclick="return confirm('Delete this task?')">Delete</button>
        </form>
        <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-gray-300 rounded">Back</a>
    </div>
</div>
@endsection
