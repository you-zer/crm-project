@php
    $selectedClient = old('client_id', $deal->client_id ?? null);
    $selectedTitle = old('title', $deal->title ?? '');
    $selectedAmount = old('amount', $deal->amount ?? '');
    $selectedContent = old('content', $deal->content ?? '');
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
        <x-input-label for="amount" value="Размер" />
        <x-text-input id="amount" name="amount" type="number" step="0.01" class="mt-1 block w-full" :value="old('amount', $selectedAmount ?? '')" />
        <x-input-error :messages="$errors->get('amount')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="status" value="Статус" />
        <select id="status" name="status"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @foreach (['pending' => 'Pending', 'won' => 'Won', 'lost' => 'Lost'] as $v => $l)
                <option value="{{ $v }}" @selected(old('status') == $v)>{{ $l }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="closed_at" value="Дата закрытия" />
        <x-text-input id="closed_at" name="closed_at" type="date" class="mt-1 block w-full" :value="old('closed_at', $selectedCloced_at ?? '')" />
        <x-input-error :messages="$errors->get('closed_at')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="assigned_user_id" value="assigned_user_id" />
        <select id="assigned_user_id" name="assigned_user_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @foreach (App\Models\User::all() as $u)
                <option value="{{ $u->id }}" @selected(old('assigned_user_id') == $u->id)>{{ $u->name }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('assigned_user_id')" class="mt-2" />
    </div>
</div>
