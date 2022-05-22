<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\ProductoRequest;
use App\Http\Resources\PresentacionResource;
use App\Models\Presentacion;
use Exception;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::All()->sortBy('nombre');
        return view('productos.index')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        $producto = new Producto();
        
        $producto->nombre = $request->nombre;

        $producto->save();

        return redirect()->route('productos-index')->with('success', 'Se agregó con éxito el nuevo tipo de producto.');
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
        $producto = Producto::findOrFail($id);
        return view('productos.update')->with('producto',$producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
        try{
            $producto = Producto::findOrFail($id);

            $producto->nombre = $request->nombre;

            $producto->save();

            return redirect()->route('productos-index')->with('success', 'Se modificó con éxito el tipo de producto.'); 
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
        $producto = Producto::findOrFail($id);
        $producto->delete();
        
        return redirect()->route('productos-index')->with('success', 'Se elimino con éxito al tipo de producto.');
    }

    /**
     * Display a listing of the resource for the API's endpoint.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return response()->jSon([Producto::all()],200);
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
        if(isset($presentaciones)){
            return response()->jSon([PresentacionResource::collection($presentaciones)],200);
        }else{
            return response()->jSon(["No tenemos productos del tipo indicado todavía."],500);
        }
    }
}
