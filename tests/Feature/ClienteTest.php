<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClienteTest extends TestCase
{
    use RefreshDatabase;

    public function test_creacion_de_cliente()
    {
        $cliente = Cliente::factory()->create(['nombre' => 'Juan Perez']);

        $this->assertDatabaseHas('clientes', ['nombre' => 'Juan Perez']);
    }

    public function test_actualizacion_de_cliente()
    {
        $cliente = Cliente::factory()->create(['nombre' => 'Carlos']);

        $cliente->update(['nombre' => 'Carlos Actualizado']);

        $this->assertDatabaseHas('clientes', ['nombre' => 'Carlos Actualizado']);
    }

    public function test_eliminacion_de_cliente()
    {
        $cliente = Cliente::factory()->create(['nombre' => 'Eliminar']);

        $cliente->delete();

        $this->assertDatabaseMissing('clientes', ['nombre' => 'Eliminar']);
    }
}

