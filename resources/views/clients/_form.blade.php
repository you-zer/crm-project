@php
    $selected = old('tag_ids', $tagIds);
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Фамилия -->
    <div>
        <x-input-label for="last_name" value="Фамилия" />
        <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $client->last_name ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
    </div>

    <!-- Имя -->
    <div>
        <x-input-label for="first_name" value="Имя" />
        <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $client->first_name ?? '')"
            required />
        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
    </div>

    <!-- Отчество -->
    <div>
        <x-input-label for="middle_name" value="Отчество" />
        <x-text-input id="middle_name" name="middle_name" type="text" class="mt-1 block w-full" :value="old('middle_name', $client->middle_name ?? '')" />
        <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
    </div>

    <!-- Компания -->
    <div>
        <x-input-label for="company" value="Компания" />
        <x-text-input id="company" name="company" type="text" class="mt-1 block w-full" :value="old('company', $client->company ?? '')" />
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>

    <!-- Email -->
    <div>
        <x-input-label for="email" value="Email" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $client->email ?? '')"
            required />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Телефон -->
    <div>
        <x-input-label for="phone" value="Телефон" />
        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $client->phone ?? '')" />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>

    <!-- Статус -->
    <div>
        <x-input-label for="status_id" value="Статус" />
        <select id="status_id" name="status_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @foreach ($statuses as $status)
                <option value="{{ $status->id }}"
                    {{ old('status_id', $client->status_id ?? '') == $status->id ? 'selected' : '' }}>
                    {{ $status->name }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('status_id')" class="mt-2" />
    </div>

    <!-- Ответственный -->
    <div>
        <x-input-label for="assigned_user_id" value="Ответственный" />
        <select id="assigned_user_id" name="assigned_user_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">— Не назначен —</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    {{ old('assigned_user_id', $client->assigned_user_id ?? '') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('assigned_user_id')" class="mt-2" />
    </div>

    <!-- Теги -->
    <div class="md:col-span-2">
        <x-input-label for="tag_ids" value="Теги" />
        <select id="tag_ids" name="tag_ids[]" multiple size="4"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" @if (in_array($tag->id, (array) $selected)) selected @endif>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('tag_ids')" class="mt-2" />
    </div>

    <!-- Широта -->
    <div>
        <x-input-label for="latitude" value="Широта" />
        <x-text-input id="latitude" name="latitude" type="text" class="mt-1 block w-full" :value="old('latitude', $client->latitude ?? '')" />
        <x-input-error :messages="$errors->get('latitude')" class="mt-2" />
    </div>

    <!-- Долгота -->
    <div>
        <x-input-label for="longitude" value="Долгота" />
        <x-text-input id="longitude" name="longitude" type="text" class="mt-1 block w-full" :value="old('longitude', $client->longitude ?? '')" />
        <x-input-error :messages="$errors->get('longitude')" class="mt-2" />
    </div>

</div>
