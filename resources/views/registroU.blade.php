@extends('adminlte::page')

@section('content_header')
    <h1>Universidades registradas</h1>
@stop

@section('content')
    <form action="{{ url('/registroU') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="domain" class="form-label">Dominio</label>
            <input type="text" class="form-control" id="domain" name="domain" required>
        </div>
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