<?php

namespace App\Http\Controllers\Navigation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        return "Marcas";    
    }

    public function view($marca, $producto=null){
        if($producto){
            $mensaje = "$producto marca $marca";
        }else{
            $mensaje = "marca $marca";
        }
        return $mensaje;
    }
}
