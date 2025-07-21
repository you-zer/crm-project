<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Создать взаимодействие
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto w-full px-4 sm:px-6 lg:px-8">
            <div
                class="bg-white shadow-sm rounded-lg p-6
                        w-full sm:w-3/4 md:w-1/2 lg:w-1/2 xl:w-1/3 mx-auto">
                <form action="{{ route('interactions.store') }}" method="POST">
                    @csrf
                    @include('interactions._form', [
                        'clients' => $clients,
                        'interaction' => null,
                        'disableClient' => false,
                    ])
                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('interactions.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent
                                  rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest
                                  hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300">
                            Отмена
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent
                                       rounded-md font-semibold text-xs text-gray uppercase tracking-widest
                                       hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            Создать
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
