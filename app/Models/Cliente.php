<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'documento_tipo',
        'documento_numero',
        'correo',
        'telefono',
        'direccion',
        'IVA',
        'CUIT'
    ];    

    public function Pedidos(){
        return $this->hasMany('App\Models\Pedido');
    }

    protected $table = "clientes";

}
