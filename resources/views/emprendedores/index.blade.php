<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Emprendedores') }}
            </h2>
            <a href="{{ route('emprendedores.create') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                Crear Emprendedor
            </a>
        </div>
    </x-slot>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        ID
                    </th>
                    <th class="px-6 py-3 border-b bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th class="px-6 py-3 border-b bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Teléfono
                    </th>
                    <th class="px-6 py-3 border-b bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Rubro
                    </th>
                    <th class="px-6 py-3 border-b bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($emprendedores as $emprendedor)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">
                            {{ $emprendedor->id }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">
                            {{ $emprendedor->nombre }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">
                            {{ $emprendedor->telefono }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">
                            {{ $emprendedor->rubro }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">
                            <a href="{{ route('emprendedores.edit', $emprendedor) }}"
                               class="text-blue-500 hover:underline">Editar</a>
                            <form action="{{ route('emprendedores.destroy', $emprendedor) }}"
                                  method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No hay emprendedores registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
