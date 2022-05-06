@extends('layouts.app')

@section('titulo')
    <title> Modificar formato </title>
@endsection

@section('contenido')
    <div class="container-xl">
                <div class="table-title">
                    <div class="row">
                        <div class="col-md-8"><h2><b>Modificar formato</b></h2></div>
                    </div>
                </div>
                <br>
                
                <form action="{{route('formatos-update', ['id' => $formato->id])}}" method="POST">
                    @csrf

                    @method('patch')

                    <div class="row align-items-center">
                        <div class="col-2">
                            <label><b>Descripción</b></label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="descripcion" class="form-control" id="inputDescripcion" placeholder="Descripción" value={{old('descripcion', $formato->descripcion)}}>
                            @error('descripcion')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="row align-items-center">
                        <div class="col-2">
                            <label><b>Medidas</b></label>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" name="cantidad" class="form-control" id="inputDocNro" placeholder="Cantidad" value={{old('cantidad', $formato->cantidad)}}>
                            @error('cantidad')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <select id="inputUnidades" name="unidades" class="form-control">
                                <option value="" disabled @if (old('unidades', $formato->unidades) == "Unidad") {{ 'selected' }} @endif>Unidad de medida</option>
                                <option value="kg" @if (old('unidades', $formato->unidades) == "kg") {{ 'selected' }} @endif>Kilogramo (kg.)</option>
                                <option value="gr" @if (old('unidades', $formato->unidades) == "gr") {{ 'selected' }} @endif>Gramo (gr.)</option>
                                <option value="lt" @if (old('unidades', $formato->unidades) == "lt") {{ 'selected' }} @endif>Litros (lt.)</option>
                                <option value="cl" @if (old('unidades', $formato->unidades) == "cl") {{ 'selected' }} @endif>Centilitros (cl.)</option>
                                <option value="ml" @if (old('unidades', $formato->unidades) == "ml") {{ 'selected' }} @endif>Mililitros (ml.)</option>
                                <option value="unidad" @if (old('unidad', $formato->unidades) == "unidad") {{ 'selected' }} @endif>Unidad</option>
                            </select>
                            @error('unidades')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Modificar</button>
                </form>
    </div>
@endsection