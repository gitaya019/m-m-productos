<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'clientes_id', 'productos_id', 'cantidad'];

    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'clientes_id');
    }

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'productos_id');
    }

    // Evento que se dispara al crear una venta
    protected static function booted()
    {
        static::created(function ($venta) {
            $producto = $venta->productos;

            // Verificar si hay suficiente stock
            if ($producto->stock >= $venta->cantidad) {
                $producto->decrement('stock', $venta->cantidad);

                // Actualizar el estado del producto
                if ($producto->stock <= 0) {
                    $producto->update(['estado' => 0]);  // Desactivar producto si el stock es 0
                }
            } else {
                throw new \Exception('No hay suficiente stock disponible para realizar la venta.');
            }
        });
    }
}
