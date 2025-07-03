@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Task #{{ $task->id }}</h1>
    <form action="{{ route('tasks.update',$task) }}" method="POST">@csrf @method('PUT')
        <div class="mb-4">
            <label class="block font-medium" for="client_id">Client</label>
            <select id="client_id" disabled class="w-full border rounded px-3 py-2">
                <option>{{ $task->client->last_name }} {{ $task->client->first_name }}</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block font-medium" for="title">Title</label>
            <input id="title" name="title" value="{{ old('title',$task->title) }}" class="w-full border rounded px-3 py-2">
            @error('title')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium" for="description">Description</label>
            <textarea id="description" name="description" rows="3" class="w-full border rounded px-3 py-2">{{ old('description',$task->description) }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block font-medium" for="assigned_user_id">Assign To</label>
                <select id="assigned_user_id" name="assigned_user_id" class="w-full border rounded px-3 py-2">
                    @foreach(App\Models\User::all() as $u)
                        <option value="{{ $u->id }}" @selected(old('assigned_user_id',$task->assigned_user_id)==$u->id)>{{ $u->name }}</option>
                    @endforeach
                </select>
                @error('assigned_user_id')<p class="text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block font-medium" for="due_date">Due Date</label>
                <input id="due_date" name="due_date" type="datetime-local" value="{{ old('due_date',$task->due_date->format('Y-m-d\TH:i')) }}" class="w-full border rounded px-3 py-2">
                @error('due_date')<p class="text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block font-medium" for="status">Status</label>
                <select id="status" name="status" class="w-full border rounded px-3 py-2">
                    @foreach(['new'=>'New','in_progress'=>'In Progress','completed'=>'Completed'] as $v=>$l)
                        <option value="{{ $v }}" @selected(old('status',$task->status)==$v)>{{ $l }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-medium" for="recurrence_type">Repeat</label>
                <select id="recurrence_type" name="recurrence_type" class="w-full border rounded px-3 py-2">
                    @foreach(['none'=>'None','daily'=>'Daily','weekly'=>'Weekly','monthly'=>'Monthly'] as $v=>$l)
                        <option value="{{ $v }}" @selected(old('recurrence_type',$task->recurrence_type)==$v)>{{ $l }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-medium" for="recurrence_interval">Interval</label>
                <input id="recurrence_interval" name="recurrence_interval" type="number" min="1" value="{{ old('recurrence_interval',$task->recurrence_interval) }}" class="w-full border rounded px-3 py-2">
            </div>
        </div>
        <div class="mb-4">
            <label class="block font-medium" for="recurrence_until">Repeat Until</label>
            <input id="recurrence_until" name="recurrence_until" type="date" value="{{ old('recurrence_until',$task->recurrence_until?->format('Y-m-d')) }}" class="w-full border rounded px-3 py-2">
        </div>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update Task</button>
    </form>
</div>
@endsection
