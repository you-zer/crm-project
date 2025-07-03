@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">New Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-medium" for="client_id">Client</label>
            <select id="client_id" name="client_id" class="w-full border rounded px-3 py-2">
                @foreach($clients as $c)
                    <option value="{{ $c->id }}" @selected(old('client_id')==$c->id)>{{ $c->last_name }} {{ $c->first_name }}</option>
                @endforeach
            </select>
            @error('client_id')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4"><label for="title" class="block font-medium">Title</label>
            <input id="title" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2">
            @error('title')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4"><label for="description" class="block font-medium">Description</label>
            <textarea id="description" name="description" rows="3" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div><label for="assigned_user_id" class="block font-medium">Assign To</label>
                <select id="assigned_user_id" name="assigned_user_id" class="w-full border rounded px-3 py-2">
                    @foreach(\App\Models\User::all() as $u)
                        <option value="{{ $u->id }}" @selected(old('assigned_user_id')==$u->id)>{{ $u->name }}</option>
                    @endforeach
                </select>
                @error('assigned_user_id')<p class="text-red-600">{{ $message }}</p>@enderror
            </div>
            <div><label for="due_date" class="block font-medium">Due Date</label>
                <input id="due_date" name="due_date" type="datetime-local" value="{{ old('due_date') }}" class="w-full border rounded px-3 py-2">
                @error('due_date')<p class="text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div><label for="status" class="block font-medium">Status</label>
                <select id="status" name="status" class="w-full border rounded px-3 py-2">
                    @foreach(['new'=>'New','in_progress'=>'In Progress','completed'=>'Completed'] as $v=>$l)
                        <option value="{{ $v }}" @selected(old('status')==$v)>{{ $l }}</option>
                    @endforeach
                </select>
            </div>
            <div><label for="recurrence_type" class="block font-medium">Repeat</label>
                <select id="recurrence_type" name="recurrence_type" class="w-full border rounded px-3 py-2">
                    @foreach(['none'=>'None','daily'=>'Daily','weekly'=>'Weekly','monthly'=>'Monthly'] as $v=>$l)
                        <option value="{{ $v }}" @selected(old('recurrence_type')==$v)>{{ $l }}</option>
                    @endforeach
                </select>
            </div>
            <div><label for="recurrence_interval" class="block font-medium">Interval</label>
                <input id="recurrence_interval" name="recurrence_interval" type="number" min="1" value="{{ old('recurrence_interval',1) }}" class="w-full border rounded px-3 py-2">
            </div>
        </div>
        <div class="mb-4"><label for="recurrence_until" class="block font-medium">Repeat Until</label>
            <input id="recurrence_until" name="recurrence_until" type="date" value="{{ old('recurrence_until') }}" class="w-full border rounded px-3 py-2">
        </div>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Create Task</button>
    </form>
</div>
@endsection
