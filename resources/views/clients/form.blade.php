{{-- resources/views/clients/form.blade.php --}}
@csrf

{{-- Last Name --}}
<div class="mb-4">
    <label for="last_name" class="block font-medium">Last Name</label>
    <input id="last_name" name="last_name" type="text"
           value="{{ old('last_name', $client->last_name ?? '') }}"
           class="w-full border rounded px-3 py-2">
    @error('last_name')<p class="text-red-600">{{ $message }}</p>@enderror
</div>

{{-- First Name --}}
<div class="mb-4">
    <label for="first_name" class="block font-medium">First Name</label>
    <input id="first_name" name="first_name" type="text"
           value="{{ old('first_name', $client->first_name ?? '') }}"
           class="w-full border rounded px-3 py-2">
    @error('first_name')<p class="text-red-600">{{ $message }}</p>@enderror
</div>

{{-- Middle Name --}}
<div class="mb-4">
    <label for="middle_name" class="block font-medium">Middle Name</label>
    <input id="middle_name" name="middle_name" type="text"
           value="{{ old('middle_name', $client->middle_name ?? '') }}"
           class="w-full border rounded px-3 py-2">
    @error('middle_name')<p class="text-red-600">{{ $message }}</p>@enderror
</div>

{{-- Company --}}
<div class="mb-4">
    <label for="company" class="block font-medium">Company</label>
    <input id="company" name="company" type="text"
           value="{{ old('company', $client->company ?? '') }}"
           class="w-full border rounded px-3 py-2">
    @error('company')<p class="text-red-600">{{ $message }}</p>@enderror
</div>

{{-- Email --}}
<div class="mb-4">
    <label for="email" class="block font-medium">Email</label>
    <input id="email" name="email" type="email"
           value="{{ old('email', $client->email ?? '') }}"
           class="w-full border rounded px-3 py-2">
    @error('email')<p class="text-red-600">{{ $message }}</p>@enderror
</div>

{{-- Phone --}}
<div class="mb-4">
    <label for="phone" class="block font-medium">Phone</label>
    <input id="phone" name="phone" type="text"
           value="{{ old('phone', $client->phone ?? '') }}"
           class="w-full border rounded px-3 py-2">
    @error('phone')<p class="text-red-600">{{ $message }}</p>@enderror
</div>

{{-- Status --}}
<div class="mb-4">
    <label for="status_id" class="block font-medium">Status</label>
    <select id="status_id" name="status_id" class="w-full border rounded px-3 py-2">
        @foreach($statuses as $status)
            <option value="{{ $status->id }}"
                @selected(old('status_id', $client->status_id ?? '') == $status->id)>
                {{ $status->name }}
            </option>
        @endforeach
    </select>
    @error('status_id')<p class="text-red-600">{{ $message }}</p>@enderror
</div>

@foreach($tags as $tag)
    <label class="inline-flex items-center mr-4">
        <input type="checkbox" name="tag_ids[]"
               value="{{ $tag->id }}"
               @checked(in_array($tag->id, old('tag_ids', $tagIds)))>
        <span class="ml-2">{{ $tag->name }}</span>
    </label>
@endforeach

{{-- Address --}}
<div class="mb-4">
    <label for="address" class="block font-medium">Address</label>
    <input id="address" name="address" type="text"
           value="{{ old('address', $client->address ?? '') }}"
           class="w-full border rounded px-3 py-2">
    @error('address')<p class="text-red-600">{{ $message }}</p>@enderror
</div>

{{-- Latitude / Longitude --}}
<div class="grid grid-cols-2 gap-4 mb-4">
    <div>
        <label for="latitude" class="block font-medium">Latitude</label>
        <input id="latitude" name="latitude" type="text"
               value="{{ old('latitude', $client->latitude ?? '') }}"
               class="w-full border rounded px-3 py-2">
        @error('latitude')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="longitude" class="block font-medium">Longitude</label>
        <input id="longitude" name="longitude" type="text"
               value="{{ old('longitude', $client->longitude ?? '') }}"
               class="w-full border rounded px-3 py-2">
        @error('longitude')<p class="text-red-600">{{ $message }}</p>@enderror
    </div>
</div>

{{-- Assigned User --}}
<div class="mb-4">
    <label for="assigned_user_id" class="block font-medium">Assigned User</label>
    <select id="assigned_user_id" name="assigned_user_id" class="w-full border rounded px-3 py-2">
        <option value="">— none —</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}"
                @selected(old('assigned_user_id', $client->assigned_user_id ?? '') == $user->id)>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    @error('assigned_user_id')<p class="text-red-600">{{ $message }}</p>@enderror
</div>

{{-- Submit --}}
<button type="submit"
        class="px-4 py-2 bg-green-600 text-white rounded">
    {{ $buttonText }}
</button>
