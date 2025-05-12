{{-- resources/views/emprendedores/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        {{-- Header refinado --}}
        <div class="bg-gray-800 dark:bg-gray-900 px-6 py-4 rounded-md shadow-md">
            <h2 class="font-semibold text-2xl text-white leading-tight">
                {{ __('Emprendedores') }}
            </h2>
        </div>
        <div class="flex justify-start my-6">
            <a href="{{ route('emprendedores.create') }}"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-md shadow-sm transition">
                {{ __('Crear Emprendedor') }}
            </a>
        </div>
    </x-slot>

    {{-- Contenedor centrado para la tabla --}}
    <div class="overflow-x-auto w-full max-w-6xl mx-auto">
        <table class="min-w-full divide-y divide-gray-700 bg-gray-800 dark:bg-gray-900 rounded-lg shadow-lg">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Teléfono</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Rubro</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach ($emprendedores as $emprendedor)
                    <tr class="bg-gray-800 hover:bg-gray-700">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">{{ $emprendedor->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">{{ $emprendedor->nombre }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">{{ $emprendedor->telefono }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">{{ $emprendedor->rubro }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                            <a href="{{ route('emprendedores.edit', $emprendedor) }}"
                            class="text-indigo-400 hover:text-indigo-200 transition">Editar</a>
                            <form action="{{ route('emprendedores.destroy', $emprendedor) }}"
                                method="POST" class="inline-block ml-4">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="text-red-400 hover:text-red-200 transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
