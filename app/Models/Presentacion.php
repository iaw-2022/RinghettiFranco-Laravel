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
        'id_productomarca',
        'id_formato'
    ];    

    protected $table = "presentaciones";
    
    use HasFactory;
}
