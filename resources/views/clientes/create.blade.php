@extends('layouts.app')

@section('titulo')
    <title> Nuevo cliente </title>
@endsection

@section('contenido')
    <div class="container-xl">
                <div class="table-title">
                    <div class="row">
                        <div class="col-md-8"><h2><b>Nuevo cliente</b></h2></div>
                    </div>
                </div>
                <br>
                
                <form action="{{route('clientes-store')}}" method="POST">
                    @csrf

                    <div class="row align-items-center">
                        <div class="col-2">
                            <label><b>Nombre</b></label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="apellido" class="form-control" id="inputApellido" placeholder="Apellido" value={{old('apellido')}}>
                            @error('nombre')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Nombre" value={{old('nombre')}}>
                            @error('apellido')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="row align-items-center">
                        <div class="col-2">
                            <label><b>Documento</b></label>
                        </div>
                        <div class="col-sm-2">
                            <select id="inputDocTipo" name="doctipo" class="form-control">
                                <option disable @if (old('doctipo') == "Tipo") {{ 'selected' }} @endif>Tipo</option>
                                <option @if (old('doctipo') == "DNI") {{ 'selected' }} @endif>DNI</option>
                                <option @if (old('doctipo') == "LE") {{ 'selected' }} @endif>LE</option>
                                <option @if (old('doctipo') == "PASAPORTE") {{ 'selected' }} @endif>PASAPORTE</option>
                            </select>
                            @error('doctipo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-sm-2">
                            <input type="number" name="docnro" class="form-control" id="inputDocNro" placeholder="Número" value={{old('docnro')}}>
                            @error('docnro')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-2">
                            <label for="inputCorreo"><b>Correo</b></label>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="correo" class="form-control" id="inputCorreo" placeholder="ejemplo@ejemplo.com" value={{old('correo')}}>
                            @error('correo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror   
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-2">
                            <label for="inputTelefono"><b>Teléfono</b></label>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="telefono" class="form-control" id="inputTelefono" placeholder="+54 9 (123) 154123456" value={{old('telefono')}}>
                            @error('telefono')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-2">
                            <label><b>Domicilio</b></label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="direccion" class="form-control" id="inputDireccion" placeholder="Direccion" value={{old('direccion', $cliente->direccion)}}>
                            @error('direccion')
                                <small class="text-danger">{{$message}}</small>
                                <br>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-2">
                            <label for="inputSitIVA"><b>Situación IVA</b></label>
                        </div>
                        <div class="col-md-3">
                            <select id="inputSitIVA" name="IVA" class="form-control">
                                <option disabled @if (old('IVA') == "Tipo") {{ 'selected' }} @endif>Tipo</option>
                                <option @if (old('IVA') == "Responsable inscripto") {{ 'selected' }} @endif>Responsable inscripto</option>
                                <option @if (old('IVA') == "Monotributista") {{ 'selected' }} @endif>Monotributista</option>
                                <option @if (old('IVA') == "Consumidor final") {{ 'selected' }} @endif>Consumidor final</option>
                            </select>
                            @error('IVA')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="CUIT" class="form-control" id="inputCUIT" placeholder="CUIT" value={{old('CUIT')}}>
                            @error('CUIT')
                                <small class="text-danger">{{$message}}</small>
                            @enderror 
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
    </div>
@endsection