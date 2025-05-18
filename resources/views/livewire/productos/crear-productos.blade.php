<div class="p-6 max-w-xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Crear Producto</h2>

    @include('livewire.productos._form', ['modo' => 'crear'])

    <div class="flex justify-end mt-6 gap-3">
        <a href="{{ route('productos.index') }}">
            <x-button flat>Cancelar</x-button>
        </a>
        <x-button primary wire:click="guardar">Guardar</x-button>
    </div>
</div>