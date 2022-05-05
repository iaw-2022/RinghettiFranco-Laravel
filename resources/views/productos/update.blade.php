@extends('layouts.app')

@section('titulo')
    <title> Modificar tipo de producto </title>
@endsection

@section('contenido')
    <div class="container-xl">
                <div class="table-title">
                    <div class="row">
                        <div class="col-md-8"><h2><b>Modificar tipo de producto</b></h2></div>
                    </div>
                </div>
                <br>
                
                <form action="{{route('productos-update', ['id' => $producto->id])}}" method="POST">
                    @csrf

                    @method('patch')

                    <div class="row">
                        <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Nombre" value={{old('nombre', $producto->nombre)}}>
                        @error('nombre')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Modificar</button>
                </form>
    </div>
@endsection