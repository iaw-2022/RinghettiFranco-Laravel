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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::All()->SortBy('nombre');
        return view('marcas.index')->with('marcas',$marcas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarcaRequest $request)
    {
        $marca = new Marca();
        
        $marca->nombre = $request->nombre;

        $marca->save();

        return redirect()->route('marcas-index')->with('success', 'Se agregó con éxito la nueva marca.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca = Marca::findOrFail($id);
        return view('marcas.update')->with('marca',$marca); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarcaRequest $request, $id)
    {
        try{
            $marca = Marca::findOrFail($id);

            $marca->nombre = $request->nombre;

            $marca->save();

            return redirect()->route('marcas-index')->with('success', 'Se modificó con éxito la marca.'); 
        }catch(Exception $ex){
            return redirect()->back()->with('error', 'Algo salió mal.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);
        $marca->delete();
        
        return redirect()->route('marcas-index')->with('success', 'Se elimino con éxito la marca.');
    }

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
