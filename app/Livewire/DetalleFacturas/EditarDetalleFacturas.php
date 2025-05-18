<?php

namespace App\Livewire\DetalleFacturas;

use Livewire\Component;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\FacturaDetalle;

class EditarDetalleFacturas extends Component
{
    public $detalleId;

    public $factura_id;
    public $producto_id;
    public $cantidad;
    public $Vunitario;

    public $productosAgregados = [];

    public function mount($id)
    {
        $detalle = FacturaDetalle::findOrFail($id);

        $this->detalleId = $detalle->id;
        $this->factura_id = $detalle->factura_id;
        $this->producto_id = $detalle->producto_id;
        $this->cantidad = $detalle->cantidad;
        $this->Vunitario = $detalle->Vunitario;
    }

    public function actualizar()
    {
        $this->validate([
            'factura_id' => 'required|exists:facturas,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'Vunitario' => 'required|numeric|min:0',
        ]);

        $detalle = FacturaDetalle::findOrFail($this->detalleId);
        $detalle->update([
            'factura_id' => $this->factura_id,
            'producto_id' => $this->producto_id,
            'cantidad' => $this->cantidad,
            'Vunitario' => $this->Vunitario,
            'valorTotal' => $this->cantidad * $this->Vunitario,
        ]);

        session()->flash('mensaje', 'Detalle de Factura actualizado correctamente.');
        return redirect()->route('detalles-factura.index');
    }

    public function render()
    {
        return view('livewire.detalle-facturas.editar-detalle-facturas', [
            'facturas' => Factura::all(),
            'productos' => Producto::all(),
        ]);
    }
}