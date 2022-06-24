@extends('layouts.app')

@section('titulo')
    <title> Formatos </title>
@endsection

@section('contenido')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2><b>Formatos</b></h2></div>
                        <div class="col-sm-8"><h2><a href="{{route('formatos-create')}}" type="button" class="btn btn-primary" method="GET">Nuevo formato</a></h2></div>
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
                            <th style="width: 50%" scope="col">Detalle</th>
                            <th style="width: 50%" scope="col">Tamaño</th>
                        </tr>
                    </thead>
                
                    <tbody>
                         @foreach($formatos as $formato)
                        <tr>
                            <td>{{$formato->descripcion}}</td>
                            <td>{{$formato->cantidad}} {{$formato->unidades}}</td>
                            <td>
                                <a href="{{route('formatos-edit', ['id' => $formato->id])}}" class="edit" title="Edit" data-toggle="tooltip"><x-bi-pencil-square /></a>
                            </td>
                            <td>
                                <a href="{{route('formatos-delete', ['id' => $formato->id])}}" onclick="return confirm('¿Desea eliminar el formato {{$formato->descripcion}} {{$formato->cantidad}} {{$formato->unidades}}? Se eliminaran todos los productos bajo este formato.')"  class="delete" title="Delete" data-toggle="tooltip"><x-bi-trash3-fill /></a>
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