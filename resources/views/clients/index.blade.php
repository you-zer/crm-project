<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                Список клиентов
            </h2>
            <a href="{{ route('clients.create') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-gray text-sm font-medium rounded-lg shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                Добавить клиента
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <table class="min-w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                ФИО</th>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                Компания</th>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                Email</th>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                Статус</th>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                Менеджер</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Действия</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($clients as $client)
                            <tr class="border-t border-gray-200">
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ $client->last_name }} {{ $client->first_name }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ $client->company }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ $client->email }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ $client->status->name }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ $client->assignedUser?->name ?? '—' }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap space-x-2">
                                    <a href="{{ route('clients.show', $client) }}"
                                        class="text-blue-600">Просмотр</a>
                                    <a href="{{ route('clients.edit', $client) }}"
                                        class="text-green-600">Редактировать</a>
                                    <form action="{{ route('clients.destroy', $client) }}" method="POST"
                                        class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Удалить этого клиента?')"
                                            class="text-red-600">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
