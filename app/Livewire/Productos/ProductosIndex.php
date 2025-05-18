<?php

namespace App\Livewire\Productos;

use Livewire\Component;
use App\Models\Producto;

class ProductosIndex extends Component
{
    public $productos;

    public function mount()
    {
        $this->productos = Producto::all();
    }

    public function eliminar($id)
    {
        Producto::findOrFail($id)->delete();
        session()->flash('mensaje', 'Producto eliminado correctamente.');
        return redirect()->route('productos.index');
    }

    public function render()
    {
        return view('livewire.productos.productos-index');
    }
}

