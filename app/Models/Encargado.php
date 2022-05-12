<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    use HasFactory;
    
    public $timestamps=false;

    protected $fillable = [
        'id',
        'presentacion_id',
        'pedido_id',
        'cantidad'
    ];    

    public function Pedido(){
        return $this->belongsTo('App\Models\Pedido');
    }

    public function Presentacion(){
        return $this->belongsTo('App\Models\Presentacion');
    }

    protected $table = "encargados";

}
