<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Telefono'
    ];

    protected $guarded = [];
}
