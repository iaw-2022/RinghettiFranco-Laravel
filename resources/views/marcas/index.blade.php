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
                        <div class="col-sm-8"><h2><b>Marcas</b></h2></div>
                        <div class="col-sm-8"><h2><a href="{{route('marcas-create')}}" type="button" class="btn btn-primary" method="GET">Nueva marca</a></h2></div>
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
                            <th style="width: 100%" scope="col">Nombre</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @foreach($marcas as $marca)
                        <tr>
                            <td>{{$marca->nombre}}</td>
                            <td>
                                <a href="{{route('marcas-edit', ['id' => $marca->id])}}" class="edit" title="Edit" data-toggle="tooltip"><x-bi-pencil-square /></a>
                            </td>
                            <td>
                                <a href="{{route('marcas-delete', ['id' => $marca->id])}}" onclick="return confirm('¿Desea eliminar {{$marca->nombre}}? Se eliminaran todos los productos de la marca.')"  class="delete" title="Delete" data-toggle="tooltip"><x-bi-trash3-fill /></a>
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