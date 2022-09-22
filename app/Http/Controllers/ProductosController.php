<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\ProductoRequest;
use App\Http\Resources\ListadoResource;
use App\Http\Resources\PresentacionResource;
use App\Models\Presentacion;
use Exception;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource for the API's endpoint.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return response()->jSon(['productos' => ListadoResource::collection(Producto::all())],200);
    }

    /**
     * Display the specified resource for the API's endpoint.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $presentaciones = Presentacion::where('producto_id',$id)->get();
        return response()->jSon(['presentaciones' => PresentacionResource::collection($presentaciones)],200);
    }
}
