<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                Список сделок
            </h2>
            <a href="{{ route('deals.create') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-gray text-sm font-medium rounded-lg shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                Добавить сделку
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
                                #</th>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                Название</th>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                Клиент</th>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                Размер</th>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                Статус</th>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                Дата закрытия</th>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                Ответственный</th>
                            <th
                                class="px-6 py-4 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase last:border-r-0">
                                Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deals as $deal)
                            <tr class="border-t border-gray-200">
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ $deal->id }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ $deal->title }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ $deal->client->last_name }}
                                    {{ $deal->client->first_name }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ number_format($deal->amount, 2) }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ ucfirst($deal->status) }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ $deal->closed_at?->format('Y-m-d') ?? '—' }}</td>
                                <td class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap">
                                    {{ $deal->assignedUser->name }}</td>
                                <td
                                    class="px-6 py-4 border-r border-gray-200 last:border-r-0 whitespace-nowrap space-x-2">
                                    <a href="{{ route('deals.show', $deal) }}" class="text-blue-600">Просмотр</a>
                                    <a href="{{ route('deals.edit', $deal) }}" class="text-green-600">Редактировать</a>
                                    <form action="{{ route('deals.destroy', $deal) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600"
                                            onclick="return confirm('Удалить эту сделку?')">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4">{{ $deals->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
