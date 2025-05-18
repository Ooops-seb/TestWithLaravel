<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;

class ClientesIndex extends Component
{
    public $showModal = false;
    public $nombre;
    public $clienteId = null;

    public function guardar()
    {
        
        $this->validate([
            'nombre' => 'required|string|max:255',
        ]);

        try {
            Cliente::updateOrCreate(
                ['id' => $this->clienteId],
                ['nombre' => $this->nombre]
            );

            $mensaje = $this->clienteId
                ? "Cliente actualizado correctamente."
                : "Cliente agregado correctamente.";

            session()->flash('mensaje', $mensaje);

            $this->showModal = false;
            $this->reset('nombre', 'clienteId');

            $this->dispatch('clienteGuardado');
        } catch (\Exception $e) {
            session()->flash('mensaje', "Error al guardar cliente: " . $e->getMessage());
        }
    }

    public function editar($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            session()->flash('mensaje', "Cliente no encontrado.");
            return;
        }

        $this->clienteId = $cliente->id;
        $this->nombre = $cliente->nombre;
        $this->showModal = true;
    }

    public function eliminar($id)
    {
        try {
            Cliente::findOrFail($id)->delete();
            session()->flash('mensaje', "Cliente eliminado correctamente.");
            $this->dispatch('cliente-eliminado');
        } catch (\Exception $e) {
            session()->flash('mensaje', "Error al eliminar cliente: " . $e->getMessage());
        }
    }

    public function limpiarFormulario()
    {
        $this->reset(['nombre', 'clienteId']);
        $this->showModal = false;
    }

    public function render()
    {
        $clientes = Cliente::all();
        return view('livewire.clientes.clientes-index', compact('clientes'));
    }
}
