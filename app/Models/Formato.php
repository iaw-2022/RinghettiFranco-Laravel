<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        'id',
        'descripcion',
        'unidades',
        'cantidad'
    ];    

    protected $table = "formatos";

}
