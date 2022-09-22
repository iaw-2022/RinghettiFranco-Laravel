<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Presentacion;
use App\Http\Requests\MarcaRequest;
use App\Http\Resources\ListadoResource;
use App\Http\Resources\PresentacionResource;
use Exception;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource for the API's endpoint.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return response()->jSon(['marcas' => ListadoResource::collection(Marca::all())],200);
    }

    /**
     * Display the specified resource for the API's endpoint.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $presentaciones = Presentacion::where('marca_id',$id)->get();
        return response()->jSon(['presentaciones' => PresentacionResource::collection($presentaciones)],200);
    }
}
