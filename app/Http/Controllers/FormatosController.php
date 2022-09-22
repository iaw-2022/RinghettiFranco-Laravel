<?php

namespace App\Http\Controllers;
use App\Models\Formato;
use App\Http\Requests\FormatoRequest;
use App\Http\Resources\FormatoResource;
use App\Http\Resources\PresentacionResource;
use App\Models\Presentacion;
use Exception;

class FormatosController extends Controller
{
    /**
     * Display a listing of the resource for the API's endpoint.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return response()->jSon(['formatos' => FormatoResource::collection(Formato::all())],200);
    }

    /**
     * Display the specified resource for the API's endpoint.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $presentaciones = Presentacion::where('formato_id',$id)->get();
        return response()->jSon(['presentaciones' => PresentacionResource::collection($presentaciones)],200);
    }
}
