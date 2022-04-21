<?php

namespace App\Http\Controllers\Navigation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index(){
        return "Clientes";    
    }

    public function view($cliente){
        return "Cliente: $cliente";
    }
}
