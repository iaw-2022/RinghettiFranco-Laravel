<?php

namespace App\Http\Controllers\Navigation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        return "Pedidos";    
    }

    public function view($pedido){
        return "Pedidos: $pedido";
    }
}
