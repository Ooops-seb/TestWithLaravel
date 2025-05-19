<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FacturaDetalle;
use App\Models\Factura;
use App\Models\Producto;

class FacturaDetalleFactory extends Factory
{
    protected $model = FacturaDetalle::class;

    public function definition()
    {
        return [
            'factura_id' => Factura::factory(),
            'producto_id' => Producto::factory(),
            'cantidad' => $this->faker->numberBetween(1, 10),
            'Vunitario' => $this->faker->randomFloat(2, 5, 50),
            'valorTotal' => $this->faker->randomFloat(2, 10, 500),
        ];
    }
}
