<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                Изменить роль: {{ $user->name }}
            </h2>
            <a href="{{ route('users.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg shadow hover:bg-gray-300 transition">
                Назад к списку
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto w-full px-4 sm:px-6 lg:px-8">
            <div
                class="bg-white shadow-sm rounded-lg p-6
                        w-full sm:w-3/4 md:w-1/2 lg:w-1/2 xl:w-1/3 mx-auto">
                <form method="POST" action="{{ route('users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="role" class="block text-sm font-semibold text-gray-700">
                            Выберите роль
                        </label>
                        <select id="role" name="role"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                           focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-gray rounded">Обновить</button>
                        <a href="{{ route('users.index') }}" class="ml-2 text-gray-600">Отмена</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
