<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'venta_have_producto', 'id_venta', 'producto_id')
                    ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(UserSony::class, 'user_id');
    }
}
