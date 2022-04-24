<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    public $timestamps=false;

    protected $fillable = [
        'id',
        'id_cliente',
        'fecha_realizado',
        'fecha_entregado'
    ];    

    protected $table = "pedidos";

    use HasFactory;
}
