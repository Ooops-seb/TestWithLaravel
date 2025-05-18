<?php

namespace App\Livewire\Productos;

use Livewire\Component;
use App\Models\Producto;

class EditarProductos extends Component
{
    public $producto;
    public $nombre;
    public $costo;

    public function mount(Producto $producto)
    {
        $this->producto = $producto;
        $this->nombre = $producto->nombre;
        $this->costo = $producto->costo;
    }

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'costo' => 'required|numeric|min:0',
    ];

    public function actualizar()
    {
        $this->validate();

        $this->producto->update([
            'nombre' => $this->nombre,
            'costo' => $this->costo,
        ]);

        session()->flash('mensaje', 'Producto actualizado correctamente.');
        return redirect()->route('productos.index');
    }

    public function render()
    {
        return view('livewire.productos.editar-productos');
    }
}

