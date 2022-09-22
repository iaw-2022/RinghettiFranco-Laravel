<?php

namespace App\Http\Controllers;

use App\Models\Presentacion;
use App\Http\Requests\PresentacionRequest;
use App\Http\Resources\PresentacionResource;
use App\Models\Encargado;
use App\Models\Formato;
use App\Models\Marca;
use App\Models\Producto;
use Exception;

class PresentacionesController extends Controller
{
    /**
     * Display a listing of the resource for the API's endpoint.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return response()->jSon(['presentaciones' => PresentacionResource::collection(Presentacion::all())],200);
    }

    /**
     * Display the specified resource for the API's endpoint.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $presentacion = Presentacion::find($id);
        if(isset($presentacion)){
            return response()->jSon(['presentacion' => new PresentacionResource($presentacion)],200);
        }else{
            return response()->jSon(['message' => "No se encontró la presentación indicada."],404);
        }
    }
}
