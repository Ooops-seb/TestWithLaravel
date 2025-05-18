<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <h1 class="text-xl font-semibold">Lista de Productos</h1>

    <div class="overflow-x-auto rounded-xl border border-neutral-200 dark:border-neutral-700">
        <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
            <thead class="bg-neutral-100 dark:bg-neutral-800">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-neutral-700 dark:text-neutral-300">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-neutral-700 dark:text-neutral-300">Nombre</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-neutral-700 dark:text-neutral-300">Costo</th>
                    <th class="px-6 py-3 text-right text-sm font-medium text-neutral-700 dark:text-neutral-300">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-neutral-900 divide-y divide-neutral-200 dark:divide-neutral-800">
                @foreach ($productos as $producto)
                    <tr>
                        <td class="px-6 py-4 text-sm text-neutral-800 dark:text-neutral-200">{{ $producto->id }}</td>
                        <td class="px-6 py-4 text-sm text-neutral-800 dark:text-neutral-200">{{ $producto->nombre }}</td>
                        <td class="px-6 py-4 text-sm text-neutral-800 dark:text-neutral-200">${{ number_format($producto->costo, 2) }}</td>
                        <td class="px-6 py-4 text-sm text-right text-neutral-800 dark:text-neutral-200">
                            <div class="flex justify-end gap-2">
                                <!-- Botón Editar -->
                                <a href="{{ route('productos.editar', $producto->id) }}">
                                    <x-button
                                        color="yellow"
                                        size="xs"
                                        icon="pencil"
                                        label="Editar"
                                        class="cursor-pointer"
                                    />
                                </a>
                                <!-- Botón Eliminar -->
                                <div x-data>
                                    <x-button
                                        color="red"
                                        size="xs"
                                        icon="trash"
                                        label="Eliminar"
                                        class="cursor-pointer"
                                        wire:click="eliminar({{ $producto->id }})"
                                        wire:confirm="¿Estás seguro de eliminar este producto?"
                                    />
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Botón agregar -->
    <div class="w-full text-right mt-2">
        <a href="{{ route('productos.crear') }}">
            <button
                class="inline-block rounded-md bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700 transition cursor-pointer"
            >
                + Agregar Producto
            </button>
        </a>
    </div>

    <!-- Toast de mensaje -->
    @if (session('mensaje'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-2"
            class="fixed bottom-6 right-6 z-50 flex items-center gap-2 rounded-lg px-4 py-3 shadow-lg text-sm text-white
                {{ str_contains(session('mensaje'), 'Error') ? 'bg-red-600' : 'bg-green-600' }}">
            <!-- Ícono -->
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="{{ str_contains(session('mensaje'), 'Error')
                        ? 'M6 18L18 6M6 6l12 12'
                        : 'M5 13l4 4L19 7' }}" />
            </svg>
            <span>{{ session('mensaje') }}</span>
        </div>
    @endif
</div>
