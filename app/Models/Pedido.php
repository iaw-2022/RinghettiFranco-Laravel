<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    public $timestamps=false;

    protected $fillable = [
        'id',
        'cliente_id',
        'fecha_realizado',
        'fecha_entregado'
    ];    

    public function Cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    public function Encargados(){
        return $this->hasMany('App\Models\Encargado');
    }

    protected $table = "pedidos";

    use HasFactory;
}
