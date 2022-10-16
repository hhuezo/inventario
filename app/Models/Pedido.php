<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'Cliente',
        'FechaDespacho'
    ];

    public function clientes()
    {
        return $this->belongsTo('App\Models\Cliente', 'Cliente', 'Id');
    }
    
}
