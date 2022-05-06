@extends('layouts.app')

@section('titulo')
    <title> Nuevo pedido </title>
@endsection

@section('contenido')
    <div class="container-xl">
                <div class="table-title">
                    <div class="row">
                        <div class="col-md-8"><h2><b>Nuevo pedido</b></h2></div>
                    </div>
                </div>
                <br>
                
                <form action="{{route('pedidos-store')}}" method="POST">
                    @csrf

                    <div class="row align-items-center">
                        <div class="col-2">
                            <label><b>Cliente</b></label>
                        </div>
                        <div class="col-md-4">
                            <select id="inputClienteID" name="cliente_id" class="form-control">
                                <option value="" disabled @if (old('cliente_id') == "") {{ 'selected' }} @endif>Cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}" @if (old('cliente_id') == "{{$cliente->id}}") {{ 'selected' }} @endif>{{$cliente->apellido}}, {{$cliente->nombre}}</option>
                                @endforeach
                            </select>
                            @error('cliente_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="row align-items-center">
                        <div class="col-2">
                            <label><b>Fecha realizado</b></label>
                        </div>
                        <div class="col-md-4">
                        <input type="date" name="fecha_realizado" class="form-control" id="inputFechaRealizado" value={{old('fecha_realizado', Carbon\Carbon::now()->format('Y-m-d'))}}>
                            @error('fecha_realizado')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
    </div>
@endsection