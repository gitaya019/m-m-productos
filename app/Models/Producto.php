<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Producto extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['nombre', 'descripcion', 'price', 'estado', 'stock'];

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id');
    }

    public function compras()
    {
        return $this->hasMany(Compra::class, 'id');
    }

    // Evento que se dispara antes de guardar o actualizar el producto
    protected static function booted()
    {
        static::saving(function ($producto) {
            // Si el stock es 0 o menor, desactivar el estado
            if ($producto->stock <= 0) {
                $producto->estado = 0;  // Desactivar si no hay stock
            } else {
                $producto->estado = 1;  // Reactivar si hay stock disponible
            }
        });
    }
}
