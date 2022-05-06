@extends('layouts.app')

@section('titulo')
    <title> Modificar pedido </title>
@endsection

@section('contenido')
    <div class="container-xl">
                <div class="table-title">
                    <div class="row">
                        <div class="col-md-8"><h2><b>Modificar pedido</b></h2></div>
                    </div>
                </div>
                <br>
                
                <form action="{{route('pedidos-update', ['id' => $pedido->id])}}" method="POST">
                    @csrf

                    @method('patch')

                    <div class="row align-items-center">
                        <div class="col-1">
                            <label><b>Cliente</b></label>
                        </div>
                        <div class="col-md-3">
                            <select id="inputClienteID" name="cliente_id" class="form-control">
                                <option value="" disabled @if (old('cliente_id', $pedido->cliente_id) == "") {{ 'selected' }} @endif>Cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}" @if (old('cliente', $pedido->cliente_id) == "{{$producto->id}}") {{ 'selected' }} @endif>{{$cliente->apellido}}, {{$cliente->nombre}}</option>
                                @endforeach
                            </select>
                            @error('cliente_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-2">
                            <label><b>Fecha realizado</b></label>
                        </div>
                        <div class="col-md-4">
                        <input type="date" name="fecha_realizado" class="form-control" id="inputFechaRealizado" value={{old('fecha_realizado', $pedido->fecha_realizado}}>
                            @error('fecha_realizado')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="row align-items-center">
                        <div class="col-2">
                            <label><b>Fecha entregado</b></label>
                        </div>
                        <div class="col-md-4">
                        <input type="date" name="fecha_entregado" class="form-control" id="inputFechaEntregado" value={{old('fecha_realizado', $pedido->fecha_entregado}}>
                            @error('fecha_entregado')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Modificar</button>
                </form>
    </div>
@endsection