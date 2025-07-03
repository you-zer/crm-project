@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">New Task</a>
    </div>
    <table class="min-w-full bg-white border">
        <thead><tr>
            <th class="px-4 py-2 border">#</th>
            <th class="px-4 py-2 border">Title</th>
            <th class="px-4 py-2 border">Client</th>
            <th class="px-4 py-2 border">Assigned To</th>
            <th class="px-4 py-2 border">Status</th>
            <th class="px-4 py-2 border">Due Date</th>
            <th class="px-4 py-2 border">Actions</th>
        </tr></thead>
        <tbody>@foreach($tasks as $task)<tr>
            <td class="px-4 py-2 border">{{ $task->id }}</td>
            <td class="px-4 py-2 border">{{ $task->title }}</td>
            <td class="px-4 py-2 border">{{ $task->client->last_name }} {{ $task->client->first_name }}</td>
            <td class="px-4 py-2 border">{{ $task->assignedUser->name }}</td>
            <td class="px-4 py-2 border">{{ ucfirst($task->status) }}</td>
            <td class="px-4 py-2 border">{{ $task->due_date->format('Y-m-d H:i') }}</td>
            <td class="px-4 py-2 border space-x-2">
                <a href="{{ route('tasks.show',$task) }}" class="text-blue-600">View</a>
                <a href="{{ route('tasks.edit',$task) }}" class="text-green-600">Edit</a>
                <form action="{{ route('tasks.destroy',$task) }}" method="POST" class="inline">@csrf @method('DELETE')
                    <button type="submit" class="text-red-600" onclick="return confirm('Delete this task?')">Del</button>
                </form>
            </td>
        </tr>@endforeach</tbody>
    </table>
    <div class="mt-4">{{ $tasks->links() }}</div>
</div>
@endsection
