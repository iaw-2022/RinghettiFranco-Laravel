<?php

namespace App\Http\Resources;

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
        $encargados = Encargado::where('pedido_id', $this->id)->get();

        $total = 0;

        foreach($encargados as $encargado){
            $presentacion = Presentacion::find($encargado->presentacion_id);
            $total = $total + $presentacion->precio;
        }

        return [
            'id' => $this->id,
            'fecha_realizado' => $this->fecha_realizado,
            'fecha_entregado' => $this->fecha_entregado,
            'encargados' => $encargados,
        ]; 
    }
}
