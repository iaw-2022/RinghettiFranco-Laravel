@extends('layouts.app')
@section('contenido')

<!-- Muestro un mensaje de permiso denegado-->
@if(Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
        
@endsection
