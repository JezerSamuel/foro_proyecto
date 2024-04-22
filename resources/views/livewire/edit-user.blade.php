<div class="flex justify-center h-screen" >
    <div class="p-5">
      <p class="fs-1">Editar Usuario</p>
      <br>
      <form action="{{route('actualizar.usuario', $usuario->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="name" class="form-label">Nombre:</label>
          <input class="form-control" type="text" id="name" name="name" value="{{$usuario->name}}">
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Apellido paterno:</label>
          <input class="form-control" type="text" id="apellidoPaterno" name="apellidoPaterno" value="{{$usuario->apellidoPaterno}}">
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Apellido materno:</label>
          <input class="form-control" type="text" id="apellidoMaterno" name="apellidoMaterno" value="{{$usuario->apellidoMaterno}}">
        </div>
        <div class="mb-3">
          <label for="universidad" class="form-label">Universidad:</label>
          <select
                  class="form-select mb-3"
                  aria-label="Default select example"
                  name="university_id"
                  required
                >
                  <option selected>
                    @foreach($universidades as $universidad)
                        @if($universidad->id == $usuario->university_id)
                        {{$universidad->name}}
                        @endif
                    @endforeach
                  </option>
                  <!-- lista de universidades generada dinamicamente-->
                  @foreach ($universidades as $universidad)
                     <option value="{{ $universidad->id }}">{{$universidad->name}}</option>
                  @endforeach
                </select>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Correo electronico:</label>
          <input class="form-control" type="text" id="email" name="email" value="{{$usuario->email}}">
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Telefono:</label>
          <input class="form-control" type="text" id="telefono" name="telefono" value="{{$usuario->telefono}}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </form>
    </div>
</div>