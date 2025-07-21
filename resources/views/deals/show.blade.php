<x-app-layout>
    <x-slot name="header">
        <h2 class="inline-flex font-semibold text-xl text-gray-800 leading-tight">
            Сделка #{{ $deal->id }}
        </h2>
        <a href="{{ route('deals.edit', $deal) }}"
            class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent
                              rounded-md font-semibold text-xs text-gray uppercase tracking-widest
                              hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500">
            Редактировать
        </a>
        <a href="{{ route('deals.index') }}"
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
                            Название</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {{ $deal->title }}
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 !text-left text-sm font-semibold text-gray-500">
                            Размер</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {{ number_format($deal->amount, 2) }}
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 !text-left text-sm font-semibold text-gray-500">
                            ФИО</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {{ $deal->client->last_name }} {{ $deal->client->first_name }}
                            {{ $deal->client->middle_name }}
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 !text-left text-sm font-semibold text-gray-500">
                            Статус</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {{ ucfirst($deal->status) }}
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 !text-left text-sm font-semibold text-gray-500">
                            Дата закрытия</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {{ $deal->closed_at?->format('Y-m-d') ?? '—' }}
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 !text-left text-sm font-semibold text-gray-500">
                            Ответственный</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {{ $deal->assignedUser->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
