<?php

namespace App\Livewire\Facturas;

use Livewire\Component;

class CrearFacturas extends Component
{
    public $cliente_id;
    public $fechaVenta;
    public $subtotal;
    public $iva;
    public $total;
    public $clientes = [];

    public function mount()
    {
        $this->clientes = \App\Models\Cliente::all();
    }

    public function guardar()
    {
        $this->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fechaVenta' => 'required|date',
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        \App\Models\Factura::create([
            'cliente_id' => $this->cliente_id,
            'fechaVenta' => $this->fechaVenta,
            'subtotal' => $this->subtotal,
            'iva' => $this->iva,
            'total' => $this->total,
        ]);
        session()->flash('mensaje', 'Factura creada correctamente.');
        return redirect()->route('facturas.index');
    }
    
    public function render()
    {
        return view('livewire.facturas.crear-facturas');
    }
}
