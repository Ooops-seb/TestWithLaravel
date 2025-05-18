<?php

namespace App\Livewire\Facturas;

use Livewire\Component;

class EditarFacturas extends Component
{
    public $facturaId; 
    public $cliente_id; 
    public $fechaVenta; 
    public $subtotal; 
    public $iva; 
    public $total;
    public $clientes = [];

    public function mount(\App\Models\Factura $factura)
    {
        $this->facturaId = $factura->id;
        $this->cliente_id = $factura->cliente_id;
        $this->fechaVenta = $factura->fechaVenta->format('Y-m-d');
        $this->subtotal = $factura->subtotal;
        $this->iva = $factura->iva;
        $this->total = $factura->total;
        $this->clientes = \App\Models\Cliente::all();
    }

    public function actualizar()
    {
        $this->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fechaVenta' => 'required|date',
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        \App\Models\Factura::find($this->facturaId)->update([
            'cliente_id' => $this->cliente_id,
            'fechaVenta' => $this->fechaVenta,
            'subtotal' => $this->subtotal,
            'iva' => $this->iva,
            'total' => $this->total,
        ]);
        session()->flash('mensaje', 'Factura actualizada correctamente.');
        return redirect()->route('facturas.index');
    }


    public function render()
    {
        return view('livewire.facturas.editar-facturas');
    }
}
