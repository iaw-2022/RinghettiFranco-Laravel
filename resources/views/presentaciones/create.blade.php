@extends('layouts.app')

@section('titulo')
    <title> Nueva presentación </title>
@endsection

@section('contenido')
    <div class="container-xl">
                <div class="table-title">
                    <div class="row">
                        <div class="col-md-8"><h2><b>Nueva presentación</b></h2></div>
                    </div>
                </div>
                <br>
                
                <form action="{{route('presentaciones-store')}}" method="POST">
                    @csrf

                    <div class="row align-items-center">
                        <div class="col-1">
                            <label><b>Producto</b></label>
                        </div>
                        <div class="col-md-3">
                            <select id="inputProductoID" name="producto_id" class="form-control">
                                <option value="" disabled @if (old('producto_id') == "") {{ 'selected' }} @endif>Producto</option>
                                @foreach($productos as $producto)
                                    <option value="{{$producto->id}}" @if (old('producto_id') == "{{$producto->id}}") {{ 'selected' }} @endif>{{$producto->nombre}}</option>
                                @endforeach
                            </select>
                            @error('producto_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <select id="inputMarcaID" name="marca_id" class="form-control">
                                <option value="" disabled @if (old('marca_id') == "") {{ 'selected' }} @endif>Marca</option>
                                @foreach($marcas as $marca)
                                    <option value="{{$marca->id}}" @if (old('marca_id') == "{{$marca->id}}") {{ 'selected' }} @endif>{{$marca->nombre}}</option>
                                @endforeach
                            </select>
                            @error('marca_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <select id="inputFormatoID" name="formato_id" class="form-control">
                                <option value="" disabled @if (old('formato_id') == "") {{ 'selected' }} @endif>Formato</option>
                                @foreach($formatos as $formato)
                                    <option value="{{$formato->id}}" @if (old('formato_id') == "{{$formato->id}}") {{ 'selected' }} @endif>{{$formato->descripcion}} {{$formato->cantidad}} {{$formato->unidades}}</option>
                                @endforeach
                            </select>
                            @error('producto_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <br>
                    
                    <div class="row">
                        <div class="col-1">
                            <label><b>Precio</b></label>
                        </div>
                        <div class="col-1">
                            <input type="number" name="precio" class="form-control" id="inputPrecio" placeholder="0.00" value={{old('precio')}}>
                            @error('precio')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
    </div>
@endsection