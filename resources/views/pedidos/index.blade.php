@extends('layouts.app')

@section('titulo')
    <title> Pedidos </title>
@endsection

@section('contenido')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2><b>Pedidos</b></h2></div>
                        <div class="col-sm-8"><h2><a href="" type="button" class="btn btn-primary" method="GET">Nuevo pedido</a></h2></div>
                    </div>
                </div>
          
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
               
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Cliente</th>
                            <th scope="col">Realizado</th>
                            <th scope="col">Entregado</th>
                        </tr>
                    </thead>
                
                    <tbody>
                         @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{$pedido->cliente->apellido}}, {{$pedido->cliente->nombre}}</td>
                            <td>{{$pedido->fecha_realizado}}</td>
                            <td>{{$pedido->fecha_entregado}}</td>
                            <td>
                                <a href="" class="view" title="View" data-toggle="tooltip"><x-bi-info-circle-fill /></a>
                            </td>
                            <td>
                                <a href="" class="edit" title="Edit" data-toggle="tooltip"><x-bi-pencil-square /></a>
                            </td>
                            <td>
                                <a href="" onclick="return confirm('¿Desea eliminar el pedido?')"  class="delete" title="Delete" data-toggle="tooltip"><x-bi-trash3-fill /></a>
                            </td>
                        </tr>   
                        @endforeach
                    </tbody>
                </form>
                </table>
                <div class="clearfix">
            </div>
        </div>
    </div>
@endsection