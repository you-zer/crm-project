@php
    $selectedClient = old('client_id', $comments->client_id ?? null);
    $selectedContent = old('content', $comment->content ?? '');
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <x-input-label for="client_id" value="Клиент" />
        <select id="client_id" name="client_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @foreach ($clients as $client)
                <option value="{{ $client->id }}"
                    {{ $selectedClient == $client->id ? 'selected' : '' }}>
                    {{ $client->last_name }} {{ $client->first_name }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="content" value="Контент" />
        <textarea id="content" name="content"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            rows="4">{{ $selectedContent }}</textarea>
        <x-input-error :messages="$errors->get('content')" class="mt-2" />
    </div>
</div>
