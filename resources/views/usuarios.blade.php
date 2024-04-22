@extends('adminlte::page')
@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        @tailwind base;
        @tailwind components;
        @tailwind utilities;
    </style>
@stop

@section('content')
@livewire('wire-elements-modal')
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<div class="card">
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Universidad</th>
                    <th>Rol</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    @foreach($badges as $badge)
                        @if($badge->user_id == $usuario->id)
                        <td>{{$badge->folio}}</td>
                        @endif
                    @endforeach
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->apellidoPaterno}}</td>
                    <td>{{$usuario->apellidoMaterno}}</td>
                    @foreach($universidades as $universidad)
                        @if($universidad->id == $usuario->university_id)
                        <td>{{$universidad->name}}</td>
                        @endif
                    @endforeach
                    @foreach($roles as $rol)
                        @if($rol->id == $usuario->role)
                        <td>{{$rol->name}}</td>
                        @endif
                    @endforeach
                    <td><button onclick="Livewire.dispatch('openModal', { component: 'user-data', arguments: { usuario: {{ $usuario->id }} }})"><i class="fas fa-eye" style="color: #41ee61;"></i></button></td>
                    <td><button onclick="Livewire.dispatch('openModal', { component: 'edit-user', arguments: { usuario: {{ $usuario->id }} }})"><i class="fas fa-edit" style="color: #74C0FC;"></i></i></button></td>
                    <td>
                        <form action="{{ route('borrar.usuario', $usuario->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fas fa-trash" style="color: #ee1b1b;"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        $('#example').DataTable( {
            language: {
                processing:     "",
                search:         "Buscar&nbsp;:",
                lengthMenu:    "Mostrar _MENU_ registros",
                info:           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                infoEmpty:      "Mostrando 0 a 0 de 0 entradas",
                infoFiltered:   "(filtrado de _MAX_ entradas)",
                infoPostFix:    "",
                loadingRecords: "Cargando...",
                zeroRecords:    "No se encontro el usuario",
                emptyTable:     "La&nbsp;tabla&nbsp;esta&nbsp;vacia",
                paginate: {
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Ultimo"
                },
                aria: {
                    sortAscending:  ": organizar de forma ascendente",
                    sortDescending: ": organizar de forma descendente"
                }
            }
        } );
    </script>
@stop