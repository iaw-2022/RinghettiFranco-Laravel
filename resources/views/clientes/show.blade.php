@extends('layouts.app')

@section('titulo')
    <title> Cliente </title>
@endsection

@section('contenido')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Cliente</b></h2></div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>Nombre</b></label>              
                <label class="col-form-label col-sm-10">{{$cliente->apellido}}, {{$cliente->nombre}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>Documento</b></label>              
                <label class="col-form-label col-sm-10">{{$cliente->documento_tipo}}: {{$cliente->documento_numero}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>Direccion</b></label>              
                <label class="col-form-label col-sm-10">{{$cliente->direccion}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>Contacto</b></label>              
                <label class="col-form-label col-sm-10">{{$cliente->telefono}} - {{$cliente->correo}}</label>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>Situacion IVA</b></label>              
                <label class="col-form-label col-sm-10">{{$cliente->IVA}} - {{$cliente->CUIT}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>Pedidos</b></label>              
            </div>

            <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Realizado</th>
                            <th scope="col">Entregado</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{$pedido->fecha_realizado}}</td>
                            <td>{{$pedido->fecha_entregado}}</td>
                        </tr>   
                        @endforeach
                    </tbody>
                </form>
                </table>
        </div>
    </div>
</div>
@endsection