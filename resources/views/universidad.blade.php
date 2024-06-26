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
                <th>Acciones</th> 
            </tr>
        </thead>
        <!-- Cuerpo de la tabla -->
        <tbody>
            <!-- Iteración sobre las universidades -->
            @foreach($universidades as $universidad)
            <tr>
                <td>{{ $universidad->name }}</td>
                <td>{{ $universidad->domain }}</td>
                <td><img src="{{ $universidad->img }}" alt="Logo" width="100"></td>
                <td>
                    <!-- Botón para editar -->
                    <a href="{{ route('editar.universidad', $universidad->id) }}" class="btn btn-primary">Editar</a>
                    <!-- Formulario para borrar -->
                    <form action="{{ route('borrar.universidad', $universidad->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
