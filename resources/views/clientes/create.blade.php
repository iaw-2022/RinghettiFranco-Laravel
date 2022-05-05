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
                            <input type="text" name="apellido" class="form-control" id="inputApellido" placeholder="Apellido">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Nombre">
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-2">
                            <label><b>Documento</b></label>
                        </div>
                        <div class="col-sm-2">
                            <select id="inputDocTipo" name="doctipo" class="form-control">
                                <option disabled selected>Tipo</option>
                                <option>DNI</option>
                                <option>LE</option>
                                <option>PASAPORTE</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" name="docnro" class="form-control" id="inputDocNro" placeholder="Número">
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-2">
                            <label for="inputCorreo"><b>Correo</b></label>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="correo" class="form-control" id="inputCorreo" placeholder="ejemplo@ejemplo.com">
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-2">
                            <label for="inputTelefono"><b>Teléfono</b></label>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="telefono" class="form-control" id="inputTelefono" placeholder="+54 9 (123) 154123456">
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-2">
                            <label><b>Domicilio</b></label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="calle" class="form-control" id="inputCalle" placeholder="Calle">
                        </div>
                        <div class="col-sm-1">
                            <input type="number" name="nro" class="form-control" id="inputNro" placeholder="Nro.">
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-2">
                            <label for="inputSitIVA"><b>Situación IVA</b></label>
                        </div>
                        <div class="col-md-3">
                            <select id="inputSitIVA" name="IVA" class="form-control">
                                <option disabled selected>Tipo</option>
                                <option>Responsable inscripto</option>
                                <option>Monotributista</option>
                                <option>Consumidor final</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="CUIT" class="form-control" id="inputCUIT" placeholder="CUIT"> 
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
    </div>
@endsection