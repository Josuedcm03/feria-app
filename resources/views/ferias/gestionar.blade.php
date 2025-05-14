<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Gestión de Ferias y Participantes
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @foreach ($ferias as $feria)
            <div class="bg-white dark:bg-gray-800 p-6 mb-6 rounded shadow transition duration-300 transform hover:scale-105 hover:bg-gray-50 dark:hover:bg-gray-700">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $feria->nombre }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            {{ \Carbon\Carbon::parse($feria->fecha_evento)->format('d/m/Y') }} - {{ $feria->lugar }}
                        </p>
                    </div>
                    <a href="{{ route('ferias.asignar', $feria->id) }}"
                       class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                        Añadir participantes
                    </a>
                </div>

                @if ($feria->emprendedores->count() > 0)
                    <div class="mt-4">
                        <h4 class="font-semibold text-gray-800 dark:text-gray-200">Emprendedores:</h4>
                        <ul class="list-disc list-inside text-gray-700 dark:text-gray-300">
                            @foreach ($feria->emprendedores as $emprendedor)
                                <li>{{ $emprendedor->nombre }} - {{ $emprendedor->rubro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <p class="mt-4 text-sm text-gray-500">No hay emprendedores asignados aún.</p>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>
