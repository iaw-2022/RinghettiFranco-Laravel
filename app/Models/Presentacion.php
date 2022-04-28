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
        'precio',
        'producto_id',
        'marca_id',
        'formato_id'
    ];    

    public function Producto(){
        return $this->belongsTo(Producto::class);
    }

    public function Marca(){
        return $this->belongsTo(Marca::class);
    }

    public function Formato(){
        return $this->belongsTo(Formato::class);
    }

    protected $table = "presentaciones";
    
    use HasFactory;
}
