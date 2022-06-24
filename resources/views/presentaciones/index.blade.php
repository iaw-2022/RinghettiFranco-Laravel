@extends('layouts.app')

@section('titulo')
    <title> Marcas </title>
@endsection

@section('contenido')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2><b>Productos</b></h2></div>
                        <div class="col-sm-8"><h2><a href="" type="button" class="btn btn-primary" method="GET">Agregar producto</a></h2></div>
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
                            <th scope="col">Stock</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Formato</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @foreach($presentaciones as $presentacion)
                        <tr>
                            <td>{{$presentacion->stock}}</td>
                            <td>{{$presentacion->marca->nombre}}</td>
                            <td>{{$presentacion->producto->nombre}}</td>
                            <td>{{$presentacion->formato->descripcion}} {{$presentacion->formato->cantidad}} {{$presentacion->formato->unidades}}</td>
                            <td>${{$presentacion->precio}}</td>
                            <td>
                                <a href="" class="edit" title="Edit" data-toggle="tooltip"><x-bi-pencil-square /></a>
                            </td>
                            <td>
                                <a href="" onclick="return confirm('¿Desea eliminar {{$presentacion->producto->nombre}}  {{$presentacion->marca->nombre}} en {{$presentacion->formato->descripcion}} {{$presentacion->formato->cantidad}} {{$presentacion->formato->unidades}}?')"  class="delete" title="Delete" data-toggle="tooltip"><x-bi-trash3-fill /></a>
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