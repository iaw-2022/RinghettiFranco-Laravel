<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{

    public $timestamps=false;

    protected $fillable = [
        'id',
        'stock',
        'id_producto',
        'id_marca',
        'id_formato'
    ];    

    public function Producto(){
        return $this->hasOne('App\Models\Producto');
    }

    public function Marca(){
        return $this->hasOne('App\Models\Marca');
    }

    public function Formato(){
        return $this->hasOne('App\Models\Formato');
    }

    protected $table = "presentaciones";
    
    use HasFactory;
}
