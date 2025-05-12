<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Bienvenido, {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- 🔹 Estadísticas rápidas --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">Ferias registradas</h3>
                    <p class="text-4xl font-bold text-indigo-600">
                        {{ \App\Models\Feria::count() }}
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">Emprendedores activos</h3>
                    <p class="text-4xl font-bold text-indigo-600">
                        {{ \App\Models\Emprendedor::count() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
