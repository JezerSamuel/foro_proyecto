<div class="flex justify-center h-screen" >
    <div class="row p-5">
      <div class="col text-center">
        @foreach($badges as $badge)
          @if($badge->user_id == $usuario->id)
          <img src="{{$badge->imagen}}" alt="UserImg" width="300px">
          @endif
        @endforeach
        <br>
        <label for="Name" class="fw-bold">{{$usuario->name.' '.$usuario->apellidoPaterno.' '.$usuario->apellidoMaterno}}</label>
      </div>
      <div class="col p-3">
        <h3 class="fw-bold">Email:</h3>
        <label for="Email" class="fw-normal">{{$usuario->email}}</label>
        <h3 class="fw-bold">Telefono:</h3>
        <label for="Email" class="fw-normal">{{$usuario->telefono}}</label>
        <h3 class="fw-bold">Rol:</h3>
        <label for="Email" class="fw-normal">
        @foreach($eventRoles as $rol)
          @if($rol->id == $usuario->role)
          {{$rol->name}}
          @endif
        @endforeach
        </label>
        <h3 class="fw-bold">Universidad:</h3>
        <label for="Email" class="fw-normal">
          @foreach($universidades as $universidad)
                        @if($universidad->id == $usuario->university_id)
                        {{$universidad->name}}
                        @endif
                    @endforeach
        </label>
        <h3 class="fw-bold">Fecha de registro:</h3>
        <label for="Email" class="fw-normal">
          @foreach($badges as $badge)
                        @if($badge->user_id == $usuario->id)
                        {{$badge->registration_date}}
                        @endif
                    @endforeach
        </label>
      </div>
      <embed src="/storage/file.pdf" width="250px" height="350px" />
    </div>
</div>