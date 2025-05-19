<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Factura;
use App\Models\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacturaTest extends TestCase
{
    use RefreshDatabase;

    public function test_creacion_de_factura()
    {
        $cliente = Cliente::factory()->create();
        $factura = Factura::factory()->create([
            'cliente_id' => $cliente->id,
            'subtotal' => 100.00,
            'iva' => 12.00,
            'total' => 112.00,
        ]);

        $this->assertDatabaseHas('facturas', ['total' => 112.00]);
    }

    public function test_actualizacion_de_factura()
    {
        $factura = Factura::factory()->create(['subtotal' => 50.00]);

        $factura->update(['subtotal' => 60.00]);

        $this->assertDatabaseHas('facturas', ['subtotal' => 60.00]);
    }
}

