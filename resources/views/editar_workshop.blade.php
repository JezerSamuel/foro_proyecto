@extends('adminlte::page')

@section('content_header')
    <h1>Editar Universidad</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('actualizar.taller', $taller->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="name" value="{{ $taller->name }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $taller->description }}">
                </div>
                <div class="mb-3">
                    <label for="capacidad" class="form-label">Capacidad:</label>
                    <input type="text" class="form-control" id="capcidad" name="capacidad" value="{{ $taller->capacidad }}">
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo" required>
                </div>
                

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
@stop
