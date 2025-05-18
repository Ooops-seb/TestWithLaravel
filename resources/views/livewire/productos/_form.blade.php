<div class="max-w-5xl mx-auto">
    <form wire:submit.prevent="guardar" class="space-y-6">
        <!-- Nombre -->
        <div class="space-y-1">
            <x-input
                label="Nombre del producto"
                placeholder="Ingresa el nombre"
                wire:model.defer="nombre"
                class="w-full"
            />
            @error('nombre')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Costo -->
        <div class="space-y-1">
            <x-input
                label="Costo"
                type="number"
                step="0.01"
                placeholder="Ej. 25.50"
                wire:model.defer="costo"
                class="w-full"
            />
            @error('costo')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </form>
</div>
