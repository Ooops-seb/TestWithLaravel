<div class="p-6 max-w-xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Editar Producto</h2>

    @include('livewire.productos._form', ['modo' => 'editar'])

    <div class="flex justify-end mt-6 gap-3">
        <a href="{{ route('productos.index') }}">
            <x-button flat>Cancelar</x-button>
        </a>
        <x-button primary wire:click="actualizar">Actualizar</x-button>
    </div>
</div>

