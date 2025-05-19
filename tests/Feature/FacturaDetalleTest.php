<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\FacturaDetalle;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacturaDetalleTest extends TestCase
{
    use RefreshDatabase;

    public function test_creacion_de_detalle_factura()
    {
        $factura = Factura::factory()->create();
        $producto = Producto::factory()->create();

        $detalle = FacturaDetalle::factory()->create([
            'factura_id' => $factura->id,
            'producto_id' => $producto->id,
            'cantidad' => 2,
            'Vunitario' => 50.00,
            'valorTotal' => 100.00,
        ]);

        $this->assertDatabaseHas('factura_detalles', ['valorTotal' => 100.00]);
    }

    public function test_eliminacion_de_detalle_factura()
    {
        $detalle = FacturaDetalle::factory()->create(['cantidad' => 1]);

        $detalle->delete();

        $this->assertDatabaseMissing('factura_detalles', ['cantidad' => 1]);
    }
}
