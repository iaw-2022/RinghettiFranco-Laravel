@extends('layouts.app')

@section('titulo')
    <title> Pedido </title>
@endsection

@section('contenido')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Pedido</b></h2></div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
            
            <div class="row">
                <label class="col-sm-2 col-form-label"><b>Cliente</b></label>              
                <label class="col-form-label col-sm-10">{{$pedido->Cliente->apellido}}, {{$pedido->Cliente->nombre}}</label>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label"><b>Contacto</b></label>              
                <label class="col-form-label col-sm-10">{{$pedido->Cliente->telefono}} - {{$pedido->Cliente->correo}}</label>
            </div>
            
            <div class="row">
                <label class="col-sm-2 col-form-label"><b>Situacion IVA</b></label>              
                <label class="col-form-label col-sm-10">{{$pedido->Cliente->IVA}} - {{$pedido->Cliente->CUIT}}</label>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label"><b>Fecha realizado</b></label>              
                <label class="col-form-label col-sm-10">{{$pedido->fecha_realizado}}</label>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label"><b>Fecha entregado</b></label>              
                <label class="col-form-label col-sm-10">{{$pedido->fecha_entregado}}</label>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label"><b>Productos</b></label>              
            </div>

            <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th style="width: 10%" scope="col">Cantidad</th>
                            <th style="width: 80%" scope="col">Producto</th>
                            <th style="width: 10%" scope="col">Valor</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @foreach($encargados as $encargado)
                        <tr>
                            <td>{{$encargado->cantidad}}</td>
                            <td>{{$encargado->Presentacion->marca->nombre}} {{$encargado->Presentacion->producto->nombre}} {{$encargado->Presentacion->formato->descripcion}} {{$encargado->Presentacion->formato->cantidad}} {{$encargado->Presentacion->formato->unidades}}</td>
                            <td>${{$encargado->Presentacion->precio}}</td>
                        </tr>   
                        @endforeach
                    </tbody>
                </form>
            </table>
        </div>
    </div>
</div>
@endsection