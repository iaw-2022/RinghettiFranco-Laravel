<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Http\Requests\ClienteRequest;
use Exception;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::All()->SortBy('nombre');
        return view('clientes.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $cliente = new Cliente();

        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->documento_tipo = $request->doctipo;
        $cliente->documento_numero = $request->docnro;
        $cliente->correo = $request->correo;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->IVA = $request->IVA;
        $cliente->CUIT = $request->CUIT; 

        $cliente->save();

        return redirect()->route('clientes-index')->with('success', 'Se agregó con éxito al nuevo cliente.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        $pedidos = Pedido::all()->where('cliente_id',$id);
        return view('clientes.show')
            ->with('cliente', $cliente)
            ->with('pedidos', $pedidos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.update')->with('cliente',$cliente); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
        try{
            $cliente = Cliente::findOrFail($id);

            $cliente->nombre = $request->nombre;
            $cliente->apellido = $request->apellido;
            $cliente->documento_tipo = $request->doctipo;
            $cliente->documento_numero = $request->docnro;
            $cliente->correo = $request->correo;
            $cliente->telefono = $request->telefono;
            $cliente->direccion = $request->direccion;
            $cliente->IVA = $request->IVA;
            $cliente->CUIT = $request->CUIT; 

            $cliente->save();

            return redirect()->route('clientes-index')->with('success', 'Se modificaron con éxito los datos del cliente.'); 
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
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        
        return redirect()->route('clientes-index')->with('success', 'Se elimino con éxito al cliente.');
    }
}
