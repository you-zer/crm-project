<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                Список взаимодействий
            </h2>
            <a href="{{ route('interactions.create') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-gray text-sm font-medium rounded-lg shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                Добавить взаимодействие
            </a>
        </div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <table class="min-w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-50">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                    ID</th>
                                <th
                                    class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                    Клиент</th>
                                <th
                                    class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                    Пользователь</th>
                                <th
                                    class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                    Тип</th>
                                <th
                                    class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                    Контент</th>
                                <th
                                    class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                    Дата</th>
                                <th
                                    class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                    Действия</th>
                            </tr>
                        </thead>
                    <tbody class="bg-white">
                        @foreach ($interactions as $interaction)
                            <tr class="border-t border-gray-200">
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ $interaction->id }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ $interaction->client->last_name }}
                                    {{ $interaction->client->first_name }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ $interaction->user->name }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ ucfirst($interaction->type) }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ Str::limit($interaction->content, 50) }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ $interaction->created_at->format('Y-m-d H:i') }}</td>
                                <td
                                    class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap space-x-2">
                                    <a href="{{ route('interactions.show', $interaction) }}"
                                        class="text-blue-600">Просмотр</a>
                                    <a href="{{ route('interactions.edit', $interaction) }}"
                                        class="text-green-600">Редактировать</a>
                                    <form action="{{ route('interactions.destroy', $interaction) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600"
                                            onclick="return confirm('Delete?')">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="p-4">
            {{ $interactions->links() }}
        </div>
    </div>
</x-app-layout>
