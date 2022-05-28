<?php

namespace App\Http\Resources;

use App\Models\Cliente;
use App\Models\Encargado;
use App\Models\Presentacion;
use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $cliente = Cliente::findOrFali($this->cliente_id);

        $encargados = Encargado::where('pedido_id', $this->id)->get();
        $total = 0;
        foreach($encargados as $encargado){
            $presentacion = Presentacion::findOrFail($encargado->presentacion_id);
            $total += $presentacion->precio;
        }
        
        return [
            'id' => $this->id,
            'cliente_id' => $this->cliente_id,
            //'cliente_nombre' => $cliente->apellido.' '.$cliente->nombre,
            'fecha_realizado' => $this->fecha_realizado,
            'fecha_entregado' => $this->fecha_entregado,
            'total' => $total
        ]; 
    }
}
