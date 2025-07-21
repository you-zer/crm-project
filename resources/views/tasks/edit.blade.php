<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Редактировать задачу #{{ $task->id }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <form action="{{ route('tasks.update', $task) }}" method="POST">
                    @method('PUT')
                    @csrf
                    @include('tasks._form', [
                        'clients' => [$task->client],
                        'task' => $task,
                        'disableClient' => true,
                    ])
                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('tasks.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent
                                  rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest
                                  hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300">
                            Отмена
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent
                                       rounded-md font-semibold text-xs text-gray uppercase tracking-widest
                                       hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            Сохранить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
