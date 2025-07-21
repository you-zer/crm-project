@php
    // $interaction может быть null (для создания) или моделью (для редактирования)
    $selectedClient = old('client_id', $interaction->client_id ?? null);
    $selectedType = old('type', $interaction->type ?? null);
    $selectedContent = old('content', $interaction->content ?? '');
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <x-input-label for="client_id" value="Клиент" />
        <select id="client_id" name="client_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 {{ $disableClient ? 'cursor-not-allowed opacity-50' : '' }}"
            {{ $disableClient ? 'disabled' : '' }}>
            @foreach ($clients as $clientOption)
                <option value="{{ $clientOption->id }}" {{ $selectedClient == $clientOption->id ? 'selected' : '' }}>
                    {{ $clientOption->last_name }} {{ $clientOption->first_name }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="type" value="Тип" />
        <select id="type" name="type"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @foreach (['call' => 'Звонок', 'email' => 'Email', 'meeting' => 'Встреча'] as $value => $label)
                <option value="{{ $value }}" {{ $selectedType === $value ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('type')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="content" value="Контент" />
        <textarea id="content" name="content"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            rows="4">{{ $selectedContent }}</textarea>
        <x-input-error :messages="$errors->get('content')" class="mt-2" />
    </div>
</div>
