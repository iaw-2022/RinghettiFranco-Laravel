@extends('layouts.app')

@section('titulo')
    <title> Clientes </title>
@endsection

@section('contenido')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2><b>Clientes</b></h2></div>
                        <div class="col-sm-8"><h2><a href="{{route('clientes-create')}}" type="button" class="btn btn-primary" method="GET">Nuevo cliente</a></h2></div>
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
                            <th scope="col">Nombre</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Sit. IVA</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->apellido}}, {{$cliente->nombre}}</td>
                            <td>{{$cliente->documento_tipo}}: {{$cliente->documento_numero}}</td>
                            <td>{{$cliente->correo}}</td>
                            <td>{{$cliente->IVA}}</td>
                            <td>
                                <a href="{{route('clientes-show', ['id' => $cliente->id])}}" class="view" title="View" data-toggle="tooltip"><x-bi-info-circle-fill /></a>
                            </td>
                            <td>
                                <a href="" class="edit" title="Edit" data-toggle="tooltip"><x-bi-pencil-square /></a>
                            </td>
                            <td>
                                <a href="" onclick="return confirm('¿Desea eliminar a {{$cliente->apellido}}, {{$cliente->nombre}}?')"  class="delete" title="Delete" data-toggle="tooltip"><x-bi-trash3-fill /></a>
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