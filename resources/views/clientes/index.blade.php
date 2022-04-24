@extends('layouts.baselayout')

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