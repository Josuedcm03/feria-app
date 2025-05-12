<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
            Participantes de {{ $feria->nombre }}
        </h2>
    </x-slot>

    <div class="p-6 max-w-4xl mx-auto space-y-8">
        {{-- Asignar Emprendedor --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-md">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Asignar nuevo emprendedor</h3>
            <form action="{{ route('ferias.vincular', $feria) }}" method="POST" class="flex flex-col sm:flex-row gap-4 items-start sm:items-center">
                @csrf
                <select name="emprendedor_id" class="w-full sm:w-auto rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                    @foreach ($todos as $emprendedor)
                        @if (!in_array($emprendedor->id, $asignados))
                            <option value="{{ $emprendedor->id }}">{{ $emprendedor->nombre }} - {{ $emprendedor->rubro }}</option>
                        @endif
                    @endforeach
                </select>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                    Asignar
                </button>
            </form>
        </div>

        {{-- Lista de asignados --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-md">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Emprendedores asignados</h3>
            @if ($feria->emprendedores->count())
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($feria->emprendedores as $emprendedor)
                        <li class="py-3 flex justify-between items-center">
                            <span class="text-gray-700 dark:text-gray-300">{{ $emprendedor->nombre }} - {{ $emprendedor->rubro }}</span>
                            <form method="POST" action="{{ route('ferias.desvincular', [$feria, $emprendedor->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline text-sm">Eliminar</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-sm text-gray-500">No hay emprendedores asignados aún.</p>
            @endif
        </div>
    </div>
</x-app-layout>
