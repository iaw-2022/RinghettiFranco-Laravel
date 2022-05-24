<?php

namespace App\Http\Controllers;
use App\Models\Formato;
use App\Http\Requests\FormatoRequest;
use App\Http\Resources\PresentacionResource;
use App\Models\Presentacion;
use Exception;

class FormatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formatos = Formato::All()->SortBy(['descripcion', 'asc'], ['cantidad', 'desc'],);
        return view('formatos.index')->with('formatos',$formatos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormatoRequest $request)
    {
        $formato = new Formato();
        
        $formato->descripcion = $request->descripcion;
        $formato->cantidad = $request->cantidad;
        $formato->unidades = $request->unidades;

        $formato->save();

        return redirect()->route('formatos-index')->with('success', 'Se agregó con éxito el nuevo formato.');
    
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
        $formato = Formato::findOrFail($id);
        return view('formatos.update')->with('formato',$formato);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormatoRequest $request, $id)
    {
        try{
            $formato = Formato::findOrFail($id);

            $formato->descripcion = $request->descripcion;
            $formato->cantidad = $request->cantidad;
            $formato->unidades = $request->unidades;

            $formato->save();

            return redirect()->route('formatos-index')->with('success', 'Se modificó con éxito el formato.'); 
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
        $formato = Formato::findOrFail($id);
        $formato->delete();
        
        return redirect()->route('formatos-index')->with('success', 'Se elimino con éxito el formato.');
    }

    /**
     * Display a listing of the resource for the API's endpoint.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return response()->jSon(['formatos' => Formato::all()],200);
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
        if(isset($presentaciones)){
            return response()->jSon(['presentaciones' => PresentacionResource::collection($presentaciones)],200);
        }else{
            return response()->jSon(['respuesta' => "No tenemos productos en el formato indicado todavía."],500);
        }
    }
}
