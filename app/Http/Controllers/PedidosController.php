<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Encargado;
use App\Models\Presentacion;
use App\Http\Requests\PedidoRequest;
use App\Http\Resources\EncargadoResource;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
        return view('pedidos.index')->with('pedidos', $pedidos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage for the API's endpoint.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = Auth::user();

        $nuevopedido = new Pedido();

        $nuevopedido->cliente_id = $cliente->id;
        $nuevopedido->fecha_realizado = $request->fecha_realizado;

        $nuevopedido->save();

        foreach($request->encargados as $encargado){
            $nuevoitem = new Encargado();

            $nuevoitem->pedido_id = $nuevopedido->id;
            $nuevoitem->presentacion_id = $encargado['presentacion_id'];
            $nuevoitem->cantidad = $encargado['cantidad'];

            $nuevoitem->save();
        }

        return response()->jSon(["Se realizó con exito el pedido."], 200);
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
        $encargados = Encargado::all()->where('pedido_id', $id);
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
        try {
            $pedido = Pedido::findOrFail($id);

            $pedido->fecha_entregado = Carbon::now()->format('Y-m-d');

            $pedido->save();

            return redirect()->route('pedidos-index')->with('success', 'Se notificó con éxito la entrega del pedido.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Algo salió mal.');
        }
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
        //
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

    /**
     * Display a listing of the resource for the API's endpoint.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $cliente = Auth::user();
        return response()->jSon([Pedido::where('cliente_id', $cliente->id)->get()], 200);
    }

    /**
     * Display the specified resource for the API's endpoint.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $pedido = Pedido::findOrFail($id);
        $encargados = Encargado::where('pedido_id', $pedido->id)->get();
        if (isset($pedido)) {
            return response()->jSon(['pedido' => $pedido, 'encargados' => EncargadoResource::collection($encargados)], 200);
        } else {
            return response()->jSon(["No existe el pedido indicado."], 500);
        }
    }

    public function cancel($id){
        $pedido = Pedido::findOrFail($id);

        if (isset($pedido)) {

            $fecharealizado = Carbon::createFromFormat('Y-m-d',  $pedido->fecha_realizado);
            $fechamargen = $fecharealizado->addDay();
            $hoy = Carbon::now();

            if($hoy->lte($fechamargen)){
                $pedido->delete();
                
                return response()->jSon(["Se canceló con éxito el pedido."], 200);
            } else {
                return response()->jSon(["Paso el período de gracia para la cancelación del pedido."], 406);
            }

        } else {
            return response()->jSon(["No existe el pedido indicado."], 500);
        }
    }
}
