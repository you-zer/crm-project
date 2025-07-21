<x-app-layout>
    <x-slot name="header">
        <h2 class="inline-flex font-semibold text-xl text-gray-800 leading-tight">
            Карточка клиента
        </h2>
        <a href="{{ route('clients.edit', $client) }}"
            class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent
                              rounded-md font-semibold text-xs text-gray uppercase tracking-widest
                              hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500">
            Редактировать
        </a>
        <a href="{{ route('clients.index') }}"
            class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent
                              rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest
                              hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300">
            Назад
        </a>
    </x-slot>

    <div class="py-6 flex justify-center">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden inline-block">
            <table class="min-w-full border-collapse border border-gray-200">
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 !text-left text-sm font-semibold text-gray-500">
                            ФИО</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {{ $client->last_name }} {{ $client->first_name }} {{ $client->middle_name }}
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 text-left text-sm font-semibold text-gray-500">
                            Компания</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {{ $client->company }}
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 text-left text-sm font-semibold text-gray-500">
                            Email</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            <a href="mailto:{{ $client->email }}" class="hover:underline">
                                {{ $client->email }}
                            </a>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 text-left text-sm font-semibold text-gray-500">
                            Телефон</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {{ $client->phone }}
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 text-left text-sm font-semibold text-gray-500">
                            Статус</td>
                        <td class="border border-gray-200 px-6 py-4">
                            <span
                                class="inline-block px-2 py-1 text-xs font-semibold rounded-full
                            @if ($client->status->name === 'Active') bg-green-100 text-green-800
                            @elseif($client->status->name === 'Pending') bg-yellow-100 text-yellow-800
                            @else bg-gray-100 text-gray-800 @endif">
                                {{ $client->status->name }}
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 text-left text-sm font-semibold text-gray-500">
                            Ответственный</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {{ $client->assignedUser?->name ?? '—' }}
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 text-left text-sm font-semibold text-gray-500">
                            Широта</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {{ $client->latitude ?? '—' }}
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 text-left text-sm font-semibold text-gray-500">
                            Долгота</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {{ $client->longitude ?? '—' }}
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 align-top px-6 py-4 text-left text-sm font-semibold text-gray-500">
                            Теги</td>
                        <td class="border border-gray-200 px-6 py-4">
                            @forelse($client->tags as $tag)
                                <span
                                    class="inline-flex items-center px-3 py-1 bg-gray-100 text-gray-800 text-sm font-medium rounded-full mr-2 mb-2">
                                    {{ $tag->name }}
                                </span>
                            @empty
                                <span class="text-gray-400 text-sm">нет тегов</span>
                            @endforelse
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
