<div class="max-w-5xl mx-auto">
    <form wire:submit.prevent="guardar" class="grid grid-cols-2 gap-6">
        <!-- Cliente -->
        <div class="space-y-1">
            <x-select
                label="Cliente"
                wire:model.defer="cliente_id"
                class="w-full"
            >
                <option value="">Selecciona un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </x-select>
            @error('cliente_id')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Fecha de Venta -->
        <div class="space-y-1">
            <x-input
                label="Fecha de Venta"
                type="date"
                wire:model.defer="fechaVenta"
                class="w-full"
            />
            @error('fechaVenta')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Subtotal -->
        <div class="space-y-1">
            <x-input
                label="Subtotal"
                type="number"
                step="0.01"
                placeholder="Ej. 100.00"
                wire:model.defer="subtotal"
                class="w-full"
            />
            @error('subtotal')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- IVA -->
        <div class="space-y-1">
            <x-input
                label="IVA"
                type="number"
                step="0.01"
                placeholder="Ej. 12.00"
                wire:model.defer="iva"
                class="w-full"
            />
            @error('iva')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Total -->
        <div class="space-y-1">
            <x-input
                label="Total"
                type="number"
                step="0.01"
                placeholder="Ej. 112.00"
                wire:model.defer="total"
                class="w-full"
            />
            @error('total')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </form>
</div>