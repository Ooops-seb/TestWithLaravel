<?php

namespace App\Livewire\DetalleFacturas;

use Livewire\Component;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\FacturaDetalle;

class CrearDetalleFacturas extends Component
{
    public $factura_id;
    public $producto_id;
    public $cantidad;
    public $Vunitario;

    // Array para almacenar los productos antes de guardar
    public $productosAgregados = [];

    protected $rules = [
        'factura_id' => 'required|exists:facturas,id',
        'producto_id' => 'required|exists:productos,id',
        'cantidad' => 'required|integer|min:1',
        'Vunitario' => 'required|numeric|min:0',
    ];

    public function agregarProducto()
    {
        // Validar solo los campos del producto que se agregan
        $this->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'Vunitario' => 'required|numeric|min:0',
        ]);

        $producto = Producto::find($this->producto_id);

        // Añadir al array temporal
        $this->productosAgregados[] = [
            'producto_id' => $producto->id,
            'nombre' => $producto->nombre,
            'cantidad' => $this->cantidad,
            'Vunitario' => $this->Vunitario,
        ];

        // Limpiar campos de producto para agregar más
        $this->reset(['producto_id', 'cantidad', 'Vunitario']);
    }

    public function eliminarProducto($index)
    {
        unset($this->productosAgregados[$index]);
        // Reindexar el array
        $this->productosAgregados = array_values($this->productosAgregados);
    }

    public function guardar()
    {
        $this->validate([
            'factura_id' => 'required|exists:facturas,id',
        ]);

        if (count($this->productosAgregados) === 0) {
            $this->addError('productosAgregados', 'Debe agregar al menos un producto.');
            return;
        }

        // Crear los detalles de factura
        foreach ($this->productosAgregados as $detalle) {
            FacturaDetalle::create([
                'factura_id' => $this->factura_id,
                'producto_id' => $detalle['producto_id'],
                'cantidad' => $detalle['cantidad'],
                'Vunitario' => $detalle['Vunitario'],
                'valorTotal' => $detalle['cantidad'] * $detalle['Vunitario'],
            ]);
        }

        $this->reset(['factura_id', 'productosAgregados']);
        session()->flash('mensaje', 'Detalle de Factura creado correctamente.');
        return redirect()->route('detalles-factura.index');
    }

    public function render()
    {
        return view('livewire.detalle-facturas.crear-detalle-facturas', [
            'facturas' => Factura::all(),
            'productos' => Producto::all(),
        ]);
    }
}
