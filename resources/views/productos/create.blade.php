@extends('layouts.app')

@section('titulo')
    <title> Nuevo tipo de producto </title>
@endsection

@section('contenido')
    <div class="container-xl">
                <div class="table-title">
                    <div class="row">
                        <div class="col-md-8"><h2><b>Nuevo tipo de producto</b></h2></div>
                    </div>
                </div>
                <br>
                
                <form action="{{route('productos-store')}}" method="POST">
                    @csrf

                    <div class="row align-items-center">
                        <div class="col-2">
                            <label><b>Nombre</b></label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Nombre" value={{old('nombre')}}>
                            @error('nombre')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
    </div>
@endsection