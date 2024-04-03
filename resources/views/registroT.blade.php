@extends('adminlte::page')

@section('content_header')
    <h1>Registrar taller</h1>
@stop

@section('content')
    <form action="{{ url('/registroT') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="mb-3">
            <!--Capacidad-->
            <label for="capacity" class="form-label">Capacidad</label>
            <input type="number" class="form-control" id="capacity" name="capacity" required>
        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control" id="logo" name="logo" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Añadir universidad</button>
    </form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop 