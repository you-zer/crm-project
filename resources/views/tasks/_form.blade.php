@php
    $selectedClient = old('client_id', $task->client_id ?? null);
    $selectedTitle = old('title', $task->title ?? '');
    $selectedAmount = old('amount', $task->amount ?? '');
    $selectedDescription = old('description', $task->description ?? '');
    $selectedDue_date = old('due_date', $task->due_date ?? '');
    $selectedStatus = old('status', $task->status ?? '');
    $selectedRecurrence_type = old('recurrence_type', $task->recurrence_type ?? '');
    $selectedRecurrence_interval = old('recurrence_interval', $task->recurrence_interval ?? '');
    $selectedRecurrence_until = old('recurrence_until', $task->recurrence_until ?? '');
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <x-input-label for="client_id" value="Клиент" />
        <select id="client_id" name="client_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @foreach ($clients as $client)
                <option value="{{ $client->id }}" {{ $selectedClient == $client->id ? 'selected' : '' }}>
                    {{ $client->last_name }} {{ $client->first_name }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="title" value="Название" />
        <x-text-input id="title" name="title" class="mt-1 block w-full" :value="old('title', $selectedTitle ?? '')" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="description" value="Описание" />
        <textarea id="description" name="description"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            rows="4">{{ $selectedDescription }}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="assigned_user_id" value="Ответственный пользователь" />
        <select id="assigned_user_id" name="assigned_user_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @foreach (App\Models\User::all() as $u)
                <option value="{{ $u->id }}" @selected(old('assigned_user_id') == $u->id)>{{ $u->name }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('assigned_user_id')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="due_date" value="Крайний срок" />
        <x-text-input id="due_date" name="due_date" type="datetime-local" class="mt-1 block w-full" :value="old('due_date', $selectedDue_date ?? '')" />
        <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="status" value="Статус" />
        <select id="status" name="status"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @foreach (['new' => 'New', 'in_progress' => 'In Progress', 'completed' => 'Completed'] as $v => $l)
                <option value="{{ $v }}" {{ $selectedStatus == $v ? 'selected' : '' }}>
                    {{ $l }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="recurrence_type" value="Повторение" />
        <select id="recurrence_type" name="recurrence_type"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @foreach (['none' => 'None', 'daily' => 'Daily', 'weekly' => 'Weekly', 'monthly' => 'Monthly'] as $v => $l)
                <option value="{{ $v }}" {{ $selectedRecurrence_type == $v ? 'selected' : '' }}>
                    {{ $l }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('recurrence_type')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="recurrence_interval" value="Интервал" />
        <x-text-input id="recurrence_interval" name="recurrence_interval" type="number" min="1" class="mt-1 block w-full" :value="old('recurrence_interval', $selectedRecurrence_interval ?? '')" />
        <x-input-error :messages="$errors->get('recurrence_interval')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="recurrence_until" value="Повторять до" />
        <x-text-input id="recurrence_until" name="recurrence_until" type="datetime-local" class="mt-1 block w-full" :value="old('recurrence_until', $selectedRecurrence_until ?? '')" />
        <x-input-error :messages="$errors->get('recurrence_until')" class="mt-2" />
    </div>
</div>
