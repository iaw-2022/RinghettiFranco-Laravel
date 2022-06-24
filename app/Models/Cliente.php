<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Cliente extends Model
{
    use HasApiTokens, HasFactory;

    public $timestamps=false;

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'documento_tipo',
        'documento_numero',
        'email',
        'password',
        'telefono',
        'direccion',
        'IVA',
        'CUIT',
    ];    

    protected $hidden = [
        'remember_token',
        'password'
    ];

    public function Pedidos(){
        return $this->hasMany('App\Models\Pedido');
    }

    protected $table = "clientes";

}
