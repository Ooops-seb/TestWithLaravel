<div class="p-6 max-w-3xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Editar Detalle</h2>

    @include('livewire.detalle-facturas._form')

    <div class="flex justify-end gap-3 mt-6">
        <a href="{{ route('detalles-factura.index') }}">
            <x-button flat>Cancelar</x-button>
        </a>
        <x-button primary wire:click="actualizar">Guardar</x-button>
    </div>
</div>