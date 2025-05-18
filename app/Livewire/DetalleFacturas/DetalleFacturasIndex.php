<?php

namespace App\Livewire\DetalleFacturas;

use Livewire\Component;
use App\Models\FacturaDetalle;

class DetalleFacturasIndex extends Component
{
    
    public $detalles = [];

    public function mount()
    {
        $this->detalles = FacturaDetalle::with(['factura', 'producto'])->get();
    }

    public function render()
    {
        return view('livewire.detalle-facturas.detalle-facturas-index');
    }
}
