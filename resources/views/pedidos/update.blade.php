@extends('layouts.app')

@section('titulo')
    <title> Modificar pedido </title>
@endsection

@section('contenido')
    <div class="container-xl">
                <div class="table-title">
                    <div class="row">
                        <div class="col-md-8"><h2><b>Modificar marca</b></h2></div>
                    </div>
                </div>
                <br>
                
                <form action="{{route('marcas-update', ['id' => $marca->id])}}" method="POST">
                    @csrf

                    @method('patch')

                    <div class="row">
                        <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Nombre" value={{old('nombre', $marca->nombre)}}>
                        @error('nombre')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Modificar</button>
                </form>
    </div>
@endsection