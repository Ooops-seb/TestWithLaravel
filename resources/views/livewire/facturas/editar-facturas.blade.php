<div class="p-6 max-w-6xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Editar Factura</h2>

    @include('livewire.facturas._form', ['modo' => 'editar'])

    <div class="flex justify-end mt-6 gap-3">
        <a href="{{ route('facturas.index') }}">
            <x-button flat>Cancelar</x-button>
        </a>
        <x-button primary wire:click="actualizar">Actualizar</x-button>
    </div>
</div>
