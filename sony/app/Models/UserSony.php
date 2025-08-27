<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserSony extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_sony';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
         'google_id',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    





    public function carrito()
    {
        return $this->belongsToMany(Producto::class, 'user_have_carrito', 'user_id', 'producto_id');
    }


    public function ventas()
    {
        return $this->hasMany(Venta::class, 'user_id');
    }
}
