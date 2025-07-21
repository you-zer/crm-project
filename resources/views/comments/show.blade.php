<x-app-layout>
    <x-slot name="header">
        <h2 class="inline-flex font-semibold text-xl text-gray-800 leading-tight">
            Комментарий #{{ $comment->id }}
        </h2>
        <a href="{{ route('comments.edit', $comment) }}"
            class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent
                              rounded-md font-semibold text-xs text-gray uppercase tracking-widest
                              hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500">
            Редактировать
        </a>
        <a href="{{ route('comments.index') }}"
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
                            {{ $comment->client->last_name }} {{ $comment->client->first_name }}
                            {{ $comment->client->middle_name }}
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 text-left text-sm font-semibold text-gray-500">
                            Автор</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {{ $comment->user->name }}
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 text-left text-sm font-semibold text-gray-500">
                            Контент</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {!! $comment->content !!}
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td role="rowheader"
                            class="border border-gray-200 px-6 py-4 text-left text-sm font-semibold text-gray-500">
                            Дата</td>
                        <td class="border border-gray-200 px-6 py-4 text-sm text-gray-900">
                            {{ $comment->created_at->format('Y-m-d H:i') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
