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
                            <th scope="col">Detalle</th>
                            <th scope="col">Tamaño</th>
                        </tr>
                    </thead>
                
                    <tbody>
                         @foreach($formatos as $formato)
                        <tr>
                            <td>{{$formato->descripcion}}</td>
                            <td>{{$formato->cantidad}} {{$formato->unidades}}</td>
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