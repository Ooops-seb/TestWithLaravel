<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductoTest extends TestCase
{
    use RefreshDatabase;

    public function test_creacion_de_producto()
    {
        $producto = Producto::factory()->create(['nombre' => 'Teclado', 'costo' => 20.50]);

        $this->assertDatabaseHas('productos', ['nombre' => 'Teclado']);
    }

    public function test_actualizacion_de_producto()
    {
        $producto = Producto::factory()->create(['nombre' => 'Mouse']);

        $producto->update(['nombre' => 'Mouse Inalámbrico']);

        $this->assertDatabaseHas('productos', ['nombre' => 'Mouse Inalámbrico']);
    }

    public function test_eliminacion_de_producto()
    {
        $producto = Producto::factory()->create(['nombre' => 'Monitor']);

        $producto->delete();

        $this->assertDatabaseMissing('productos', ['nombre' => 'Monitor']);
    }
}
