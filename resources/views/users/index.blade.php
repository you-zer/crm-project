<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                Список пользователей
            </h2>
        </div>
    </x-slot>
    @if (session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif
    <div class="py-6 flex justify-center">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden inline-block">
                <table class="min-w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                ФИО</th>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                Email</th>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                Роль</th>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                Действия</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($users as $user)
                            <tr class="border-t border-gray-200">
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">{{ $user->getRoleNames()->join(', ') }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    <a href="{{ route('users.edit', $user) }}" class="text-blue-600">Сменить роль</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
