<x-layouts.app :title="__('Detalles de la Factura')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        {{-- Información general de la factura --}}

        {{-- Tabla de detalles de productos --}}
        <div class="overflow-x-auto rounded-xl border border-neutral-200 dark:border-neutral-700">
            <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
                <thead class="bg-neutral-100 dark:bg-neutral-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-neutral-700 dark:text-neutral-300">Producto</th>
                        <th class="px-6 py-3 text-right text-sm font-medium text-neutral-700 dark:text-neutral-300">Cantidad</th>
                        <th class="px-6 py-3 text-right text-sm font-medium text-neutral-700 dark:text-neutral-300">V. Unitario</th>
                        <th class="px-6 py-3 text-right text-sm font-medium text-neutral-700 dark:text-neutral-300">Total</th>
                    </tr>
                </thead>

            </table>
        </div>

        {{-- Volver --}}
        <div class="text-right mt-4">
            <a href=" " class="inline-block rounded-lg bg-gray-600 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                Volver a facturas
            </a>
        </div>

    </div>
</x-layouts.app>
