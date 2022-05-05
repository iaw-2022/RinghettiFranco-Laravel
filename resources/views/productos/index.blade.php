@extends('layouts.app')

@section('titulo')
    <title> Productos </title>
@endsection

@section('contenido')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2><b>Tipos de productos</b></h2></div>
                        <div class="col-sm-8"><h2><a href="{{route('productos-create')}}" type="button" class="btn btn-primary" method="GET">Nuevo producto</a></h2></div>
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
                            <th scope="col">Producto</th>
                        </tr>
                    </thead>
                
                    <tbody>
                         @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->nombre}}</td>
                            <td>
                                <a href="{{route('productos-edit', ['id' => $producto->id])}}" class="edit" title="Edit" data-toggle="tooltip"><x-bi-pencil-square /></a>
                            </td>
                            <td>
                                <a href="{{route('productos-delete', ['id' => $producto->id])}}" onclick="return confirm('¿Desea eliminar {{$producto->nombre}}? Se eliminaran todos los productos bajo este tipo.')"  class="delete" title="Delete" data-toggle="tooltip"><x-bi-trash3-fill /></a>
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