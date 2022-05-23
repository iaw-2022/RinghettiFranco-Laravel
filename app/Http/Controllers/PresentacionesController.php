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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentaciones = Presentacion::All()->SortBy('stock');
        return view('presentaciones.index')->with('presentaciones',$presentaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::All();
        $marcas = Marca::All();
        $formatos = Formato::All();
        return view('presentaciones.create')
            ->with('productos', $productos)
            ->with('marcas', $marcas)
            ->with('formatos', $formatos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PresentacionRequest $request)
    {
        $presentacion = new Presentacion();

        $presentacion->precio = $request->precio;
        $presentacion->marca_id = $request->marca_id;
        $presentacion->producto_id = $request->producto_id;
        $presentacion->formato_id = $request->formato_id;

        $presentacion->save();

        return redirect()->route('presentaciones-index')->with('success', 'Se agregó con éxito el nuevo producto.');
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
        $presentacion = Presentacion::findOrFail($id);
        $productos = Producto::All();
        $marcas = Marca::All();
        $formatos = Formato::All();
        return view('presentaciones.update')
            ->with('presentacion', $presentacion)
            ->with('productos', $productos)
            ->with('marcas', $marcas)
            ->with('formatos', $formatos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PresentacionRequest $request, $id)
    {
        try{
            $presentacion = Presentacion::findOrFail($id);

            $presentacion->stock = $request->stock;
            $presentacion->precio = $request->precio;
            $presentacion->marca_id = $request->marca_id;
            $presentacion->producto_id = $request->producto_id;
            $presentacion->formato_id = $request->formato_id;

            $presentacion->save();

            return redirect()->route('presentaciones-index')->with('success', 'Se modificaron con éxito los datos de la presentación.'); 
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
        $encargado = Encargado::where('presentacion_id',$id)->first();
        if(isset($encargado)){
            return redirect()->back()->with('error', 'Existen pedidos con esta presentación encargada.');
        } else {
            $presentacion = Presentacion::findOrFail($id);
            $presentacion->delete();
            return redirect()->route('presentaciones-index')->with('success', 'Se elimino con éxito la presentación.');
        }
    }

    /**
     * Display a listing of the resource for the API's endpoint.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return response()->jSon([PresentacionResource::collection(Presentacion::all())],200);
    }

    /**
     * Display the specified resource for the API's endpoint.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $presentacion = Presentacion::findOrFail($id);
        if(isset($presentacion)){
            return response()->jSon([new PresentacionResource($presentacion)],200);
        }else{
            return response()->jSon(["No se encontró la presentación indicada."],404);
        }
    }
}
