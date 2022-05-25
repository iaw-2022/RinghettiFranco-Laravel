<?php

namespace App\Http\Resources;

use App\Models\Formato;
use App\Models\Marca;
use App\Models\Presentacion;
use App\Models\Producto;
use Illuminate\Http\Resources\Json\JsonResource;

class EncargadoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $presentacion = Presentacion::findOrFail($this->presentacion_id);
        $formato = Formato::findOrFail($presentacion->formato_id);
        $marca = Marca::findOrFail($presentacion->marca_id);
        $producto = Producto::findOrFail($presentacion->producto_id);
        return [
            'id' => $this->id,
            'presentacion_id' => $this->presentacion_id,
            'cantidad' => $this->cantidad,
            'presentacion_precio' => $presentacion->precio,
            'formato_id' => $presentacion->formato_id,
            'formato_descripcion' => $formato->descripcion,
            'formato_medidas' => $formato->cantidad." ".$formato->unidades,
            'marca_id' => $presentacion->marca_id,
            'marca_nombre' => $marca->nombre,
            'producto_id' => $presentacion->producto_id,
            'producto_tipo' => $producto->nombre
        ]; 
    }
}
