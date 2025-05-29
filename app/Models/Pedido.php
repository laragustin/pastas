<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['total'];

    public function productos()
    {
        return $this->hasMany(PedidoProducto::class);
    }
}
