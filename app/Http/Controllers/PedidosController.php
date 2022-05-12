<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Encargado;
use App\Models\Presentacion;
use App\Http\Requests\PedidoRequest;
use Exception;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::All()->SortBy('cliente_id');
        return view('pedidos.index')->with('pedidos',$pedidos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::All();
        $presentaciones = Presentacion::All();
        return view('pedidos.create')
            ->with('clientes',$clientes)
            ->with('presentaciones',$presentaciones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoRequest $request)
    {
        $pedido = new Pedido();

        $pedido->fecha_realizado = $request->fecha_realizado;
        $pedido->cliente_id = $request->cliente_id;

        $pedido->save();

        return redirect()->route('pedidos-index')->with('success', 'Se agregó con éxito el nuevo pedido.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        $encargados = Encargado::all()->where('pedido_id',$id);
        return view('pedidos.show')
            ->with('pedido', $pedido)
            ->with('encargados', $encargados);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        $encargados = Encargado::all()->where('pedido_id',$id);
        $clientes = Cliente::All();
        return view('pedidos.update')
            ->with('pedido', $pedido)
            ->with('encargados', $encargados)
            ->with('clientes', $clientes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $pedido = Pedido::findOrFail($id);

            $pedido->fecha_realizado = $request->fecha_realizado;
            $pedido->fecha_entregado = $request->fecha_entregado;
            $pedido->cliente_id = $request->cliente_id;

            $pedido->save();

            return redirect()->route('pedidos-index')->with('success', 'Se modificó con éxito el nuevo pedido.'); 
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
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        
        return redirect()->route('pedidos-index')->with('success', 'Se elimino con éxito el pedido.');
    }

    
}
