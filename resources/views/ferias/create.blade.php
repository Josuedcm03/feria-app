<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Feria') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('ferias.store') }}" method="POST">
                    @csrf

                    {{-- Nombre --}}
                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        @error('nombre')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Fecha --}}
                    <div class="mb-4">
                        <label for="fecha_evento" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha</label>
                        <input type="date" name="fecha_evento" id="fecha_evento" value="{{ old('fecha_evento') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        @error('fecha_evento')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Lugar --}}
                    <div class="mb-4">
                        <label for="lugar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lugar</label>
                        <input type="text" name="lugar" id="lugar" value="{{ old('lugar') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        @error('lugar')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Descripción --}}
                    <div class="mb-4">
                        <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="3"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Crear Feria
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
