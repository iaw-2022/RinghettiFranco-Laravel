<?php

namespace App\Http\Resources;

use App\Models\Formato;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Resources\Json\JsonResource;

class PresentacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $formato = Formato::findOrFail($this->formato_id);
        $marca = Marca::findOrFail($this->marca_id);
        $producto = Producto::findOrFail($this->producto_id);
        return [
            'id' => $this->id,
            'stock' => $this->stock,
            'precio' => $this->precio,
            'formato_id' => $this->formato_id,
            'formato_descripcion' => $formato->descripcion,
            'formato_medidas' => $formato->cantidad." ".$formato->unidades,
            'marca_id' => $this->marca_id,
            'marca_nombre' => $marca->nombre,
            'producto_id' => $this->producto_id,
            'producto_tipo' => $producto->nombre
        ]; 
    }
}
