<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Factura;
use App\Models\Cliente;

class FacturaFactory extends Factory
{
    protected $model = Factura::class;

    public function definition()
    {
        return [
            'cliente_id' => Cliente::factory(),
            'fechaVenta' => $this->faker->date,
            'subtotal' => $this->faker->randomFloat(2, 50, 200),
            'iva' => $this->faker->randomFloat(2, 5, 20),
            'total' => $this->faker->randomFloat(2, 70, 250),
        ];
    }
}
