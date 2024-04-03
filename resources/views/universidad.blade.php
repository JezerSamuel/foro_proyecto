@extends('adminlte::page')

@section('content_header')
    <h1>Universidades registradas</h1>
@stop

@section('content')
    <table class="table">
        <!-- Encabezados de la tabla -->
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dominio</th>
                <th>Logo</th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla -->
        <tbody>
            <!-- Iteración sobre los libros -->
            @foreach($universidades as $universidad)
            <tr>
                <td>{{ $universidad->name }}</td>
                <td>{{ $universidad->domain }}</td>
                <td><img src="{{ $universidad->img }}" alt="Portada" width="100"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop 