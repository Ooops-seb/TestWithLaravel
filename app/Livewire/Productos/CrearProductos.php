<?php

namespace App\Livewire\Productos;

use Livewire\Component;
use App\Models\Producto;

class CrearProductos extends Component
{
    public $nombre;
    public $costo;

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'costo' => 'required|numeric|min:0',
    ];

    public function guardar()
    {
        $this->validate();
        Producto::create([
            'nombre' => $this->nombre,
            'costo' => $this->costo,
        ]);
        session()->flash('mensaje', 'Producto creado correctamente.');
        return redirect()->route('productos.index');
    }

    public function render()
    {
        return view('livewire.productos.crear-productos');
    }
}

