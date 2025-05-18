<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = [
        'cliente_id',
        'fechaVenta',
        'subtotal',
        'iva',
        'total',
        // agrega más si usas otros campos
    ];

    protected $casts = [
        'cliente_id' => 'integer',
        'fechaVenta' => 'date',
        'subtotal' => 'decimal:2',
        'iva' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    // Relaciones
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
