<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cliente_id',
        'fecha_realizado',
        'fecha_entregado'
    ];    

    public function Pedido(){
        return $this->belongsTo('App\Models\Pedido');
    }

    public function Presentacion(){
        return $this->belongsTo('App\Models\Presentacion');
    }

    protected $table = "encargados";
}
