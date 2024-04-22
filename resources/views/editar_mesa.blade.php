@extends('adminlte::page')

@section('content_header')
    <h1>Editar Universidad</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('actualizar.mesa', $mesa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="name" value="{{ $mesa->nombre }}">
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
@stop
