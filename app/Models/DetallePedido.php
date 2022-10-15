<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;


    protected $table = 'detalle_pedido';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'Pedido',
        'Producto',
        'Cantidad'


    ];

    public function pedidos()
    {
        return $this->belongsTo('App\Models\Pedido', 'Pedido', 'Id');
    }

    public function productos()
    {
        return $this->belongsTo('App\Models\Producto', 'Producto', 'Id');
    }

}
