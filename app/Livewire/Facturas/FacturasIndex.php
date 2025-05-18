<?php

namespace App\Livewire\Facturas;

use Livewire\Component;

class FacturasIndex extends Component
{
    public $facturas;

    public function mount()
    {
        $this->facturas = \App\Models\Factura::with('cliente')->latest()->get();
    }
    
    public function render()
    {
        return view('livewire.facturas.facturas-index');
    }
}
