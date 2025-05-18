<div class="max-w-5xl mx-auto">
    <div class="space-y-4">
        <div>
            <x-select label="Factura" wire:model.defer="factura_id" class="w-full">
                <option value="">Seleccione</option>
                @foreach($facturas as $factura)
                    <option value="{{ $factura->id }}">
                        No.{{ $factura->id }} - {{ $factura->cliente->nombre ?? 'Sin cliente' }} - ${{ number_format($factura->total, 2) }}
                    </option>
                @endforeach
            </x-select>
            @error('factura_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex gap-6 items-end">
            <div class="flex-1">
                <x-select label="Producto" wire:model.defer="producto_id" class="w-full">
                    <option value="">Seleccione</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="w-40">
                <x-input label="Cantidad" type="number" wire:model.defer="cantidad" />
            </div>

            <div class="w-48">
                <x-input label="V. Unitario" type="number" step="0.01" wire:model.defer="Vunitario" />
            </div>

            <div>
                <x-button wire:click="agregarProducto" icon="plus" primary>Agregar</x-button>
            </div>
        </div>

        @error('producto_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        @error('cantidad') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        @error('Vunitario') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <!-- Lista temporal de productos -->
        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-2">Productos agregados</h3>
            <ul class="divide-y">
                @foreach($productosAgregados as $index => $detalle)
                    <li class="py-2 flex justify-between items-center">
                        <div>
                            {{ $detalle['nombre'] }} | Cant: {{ $detalle['cantidad'] }} | Unit: ${{ $detalle['Vunitario'] }} | Total: ${{ number_format($detalle['cantidad'] * $detalle['Vunitario'], 2) }}
                        </div>
                        <x-button wire:click="eliminarProducto({{ $index }})" icon="trash" flat red />
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>