<x-layouts.app :title="__('Clientes')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        {{-- Tabla de Clientes --}}
        <div class="overflow-x-auto rounded-xl border border-neutral-200 dark:border-neutral-700">
            <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
                <thead class="bg-neutral-100 dark:bg-neutral-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-neutral-700 dark:text-neutral-300">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-neutral-700 dark:text-neutral-300">Nombre</th>
                        <th class="px-6 py-3 text-right text-sm font-medium text-neutral-700 dark:text-neutral-300">Acciones</th>
                    </tr>
                </thead>

                <!-- Aqui va el listado de CLientes y eliminación -->
            </table>
        </div>

        {{-- Botón agregar --}}
        <div class="text-right">
            <a href=" " class="inline-block rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                + Agregar Cliente
            </a>
        </div>

    </div>
</x-layouts.app>
