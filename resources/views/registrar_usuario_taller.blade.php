<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro Internacional de Turismo</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/stylesForm.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

</head>

<body>
    <div id="navbar">
        <img src="{{ asset('storage/assets/imgForm/logooo.png') }}" alt="banner" id="banner">
    </div>
    <main class="text-center" style="padding-top: 300px">
        <div class="container bg-light mt-5 rounded border border-1 border-black p-5"
            style="width: 100%; padding-bottom: 40px; background-color: #22222286">
            <div style="background-color: #a6174b" class="container-fluid text-light p-2 text-center">
                <div>
                    <h1>REGISTRO DE TALLERES PROGRAMADOS</h1>
                </div>
            </div>
            <br />
            <!-- Mensaje de registro exitoso -->
            @if (isset($_GET['registro_exitoso']) && $_GET['registro_exitoso'] == 'true')
                <div class="alert alert-success" role="alert">
                    ¡Registro exitoso!
                </div>
            @endif
            <div class="" style="text-align: left">
                <h4>
                    Seleccionar taller al que quiera registrarse
                </h4>
                <br />
            </div>

            <div class="row">
                <!-- Formulario -->
                <div class="col-md-8">
                        <input type="hidden" name="folio" value="{{ $folio }}">
                        @foreach ($talleres as $index => $taller)
                            @php
                                $incrementedIndex = $index + 1;
                            @endphp
                            <div class="card" style="background-color: #f0f0f0;">
                                <div    
                                    style="background: #F1E8D0; margin-left:-11px;  margin-right:-11px; margin-top: -12px; padding-top: 15px; padding-bottom: 7px;text-align: center; border-radius: 8px;">
                                    <h2 style="color: #085CA6">Taller {{ $incrementedIndex }}: {{ $taller->name }}</h2>
                                </div> <br>
                                <div class="row">
                                    <div class="col-md-5">
                                        <!--logo del taller-->
                                        <img src="{{ $taller->img }}" alt="logo" class="img-fluid"
                                            style="max-width: 100%;">
                                    </div>
                                    <div class="col-md-7">
                                        <p><strong>Descripción:</strong> {{ $taller->description }}</p>
                                        @if ($taller->capacidad > 0)
                                            <p><strong>Espacios Disponibles:</strong> {{ $taller->capacidad }}</p>
                                        @else
                                            <p style="color: red"><strong>NO HAY ESPACIOS DISPONIBLES</strong></p>
                                        @endif

                                        @if ($taller->capacidad > 0)
                                        <form action="{{ route('registrar.usuario.evento') }}" method="post" style="text-align: left;">
                                            @csrf
                                            <input type="hidden" name="folio" value="{{ $folio }}">
                                            <input type="hidden" name="taller_id" value="{{ $taller->id }}">
                                            <button type="submit" class="btn btn-sm sign-up-btn mt-2 hover-green"
                                                    style="background:#82BF65; color:white">
                                                Inscribirme en {{ $taller->name }}
                                            </button>
                                        </form>
                                        @else
                                            <button type="button" class="btn btn-sm sign-up-btn mt-2 hover-green"
                                                style="background:#82BF65; color:white" disabled>No disponible</button>
                                        @endif
                                    </div>
                                </div>
                            </div> <br>
                        @endforeach
                    <br>
                </div>
                <!-- Información adicional -->
                <div class="col-md-4">
                    <!-- Columna 1 -->
                    <div
                        style="
                        background-color: #F8F4E8;
                        padding: 20px;
                        border-radius: 10px;
                        text-align: center;
                        overflow: hidden; /* To ensure the iframe doesn't overflow */
                        text-align:left;
                        ">
                        <!-- Contenido columna 1 -->
                        <div
                            style="background: #F1E8D0; margin-left:-20px;  margin-right:-20px; margin-top:-20px; padding-top: 15px; padding-bottom: 7px; padding-left: 20px">
                            <h4>Bienvenido(a)</h4>
                        </div> <br>
                        <a>
                            <img src="{{ asset('storage/assets/imgForm/contacto.png') }}" alt=""
                                style="height: 50px" />
                        </a>
                        <span style="vertical-align: middle">{{ $user->name }}</span>
                        <br /><br />
                        <a style="color: #000; text-decoration: none;">
                            <img src="{{ asset('storage/assets/imgForm/colegio.png') }}" alt=""
                                style="height: 50px" />
                            <span style="vertical-align: middle">
                                @php
                                    $university = DB::table('universities')
                                        ->where('id', $user->university_id)
                                        ->first();
                                    if ($university) {
                                        echo $university->name;
                                    }
                                @endphp
                            </span> <!-- University name here -->
                        </a>
                        <br /><br />
                        <img src="{{ asset('storage/assets/imgForm/garrapata.png') }}" alt=""
                            style="height: 50px" />
                        <span style="vertical-align: middle">
                            @php
                                $role_id = $user->role;
                                $role = DB::table('event_roles')->where('id', $role_id)->first();
                                if ($role) {
                                    echo $role->name;
                                } else {
                                    echo 'no tiene rol';
                                }
                            @endphp
                        </span>

                    </div>
                    <br /><br />
                    <!-- Columna 2 -->
                    <div
                        style="
                        background-color: #F8F4E8;
                        padding: 20px;
                        border-radius: 10px;
                        text-align: center;
                        overflow: hidden; /* To ensure the iframe doesn't overflow */ 
                        text-align:left;
                        ">
                        <!-- Contenido columna 2 -->
                        <div
                            style="background: #F1E8D0; margin-left:-20px; margin-right:-20px; margin-top:-20px; padding-top: 15px; padding-bottom: 7px; padding-left: 20px">
                            <h4>Se ha registrado a los siguientes talleres:</h4>
                        </div>
                        <br>
                        @php
                            // Obtener los talleres registrados por el usuario
                            $user_talleres = DB::table('user_taller')
                                ->where('user_id', $user->id)
                                ->get();

                            // Si el usuario tiene talleres registrados
                            if ($user_talleres->count() > 0) {
                                // Iterar sobre los talleres
                                foreach ($user_talleres as $user_taller) {
                                    // Obtener el nombre del taller
                                    $taller = DB::table('tallers')
                                        ->where('id', $user_taller->taller_id)
                                        ->first();

                                    // Mostrar el nombre del taller
                                    if ($taller) {
                                        echo '<a>';
                                        echo '<img src="' .
                                            asset('storage/assets/imgForm/marca-de-verificacion.png') .
                                            '" alt="" style="height: 50px"/>';
                                        echo '<span style="vertical-align: middle">' . $taller->name . '</span>';
                                        echo '<button type="submit" style="background: none; border: none; margin-left: 10px;" class="iconn">';
                                        echo '<img src="' . asset('storage/assets/imgForm/borrar.png') . '" alt="" style="height: 35px; padding-left: 20px"/>';
                                        echo '</button>';
                                        echo '</a><br><br>';
                                        
                                    }
                                }
                            } else {
                                // Si el usuario no tiene talleres registrados
                                echo '<span style="vertical-align: middle">No se ha registrado a ningún taller.</span>';
                            }
                        @endphp
                    </div>
                    <br><br>
                    <!-- Columna 3 -->
                    <div
                        style="
                        background-color: #F8F4E8;
                        padding: 20px;
                        border-radius: 10px;
                        text-align: center;
                        text-align:left;
                        overflow: hidden; /* To ensure the iframe doesn't overflow */
              ">
                        <!-- Contenido columna 1 -->
                        <div
                            style="background: #F1E8D0; margin-left:-20px;  margin-right:-20px; margin-top:-20px; padding-top: 15px; padding-bottom: 7px; padding-left: 20px">
                            <h4>¿Necesita más información? Contáctenos:</h4>
                        </div> <br>

                        <a href="https://maps.app.goo.gl/59iMvCGkqFVKUtpi6">
                            <img src="{{ asset('storage/assets/imgForm/marcador.png') }}" alt=""
                                style="height: 50px" class="icon" />
                        </a>
                        <span style="vertical-align: middle">Avenida 39, REG 12 MZ 325 LT 1 entre calle 56 y 46-A,
                            C.P.77930, Bacalar, Quintana Roo, Mexico.</span>
                        <br /><br />
                        <a href="tel:9831281591" style="color: #000; text-decoration: none;">
                            <img src="{{ asset('storage/assets/imgForm/llamada-telefonica (1).png') }}" alt=""
                                style="height: 50px" class="icon" />
                            <span style="vertical-align: middle">983 128 1591 Extensión 1009</span>
                        </a>
                        <br /><br />
                        <img src="{{ asset('storage/assets/imgForm/sobre.png') }}" alt="" style="height: 50px"
                            onclick="copyEmail()" class="icon" />
                        <span style="vertical-align: middle">registro4FIT@upb.edu.mx</span>
                    </div>
                    <br /><br />
                    <!-- Columna 2 -->
                    <div
                        style="
              background-color: #F8F4E8;
              padding: 20px;
              border-radius: 10px;
              text-align: center;
              overflow: hidden; /* To ensure the iframe doesn't overflow */
              text-align:left;
            ">
                        <!-- Contenido columna 1 -->
                        <div
                            style="background: #F1E8D0; margin-left:-20px;  margin-right:-20px; margin-top:-20px; padding-top: 15px; padding-bottom: 7px; padding-left: 20px">
                            <h4>
                                Siga el evento en nuestras redes sociales:
                            </h4>
                        </div> <br>
                        <div style="max-width: 100%; overflow: hidden;">
                            <iframe
                                src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FDireccionGeneralUTP%2Fposts%2Fpfbid02UaAKL7DTuCUV11wRXU9HTP9uk38jV8Fhf7PPqvtCGWD3nyZ1tpXcvyzpDDdTs1iMl&width=200&show_text=true&height=434&appId"
                                width="100%" height="434" style="border: none; overflow: hidden" scrolling="no"
                                frameborder="0" allowfullscreen="true"
                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </div>
                    </div>
                    <br /><br />
                </div>
                <h6>
                    Seleccionar checkbox para realizar tu inscripción a los talleres.
                </h6>
            </div>
        </div>

    </main>
    <!-- Pie de página -->
    <footer class="footer"
        style="
        background-color: #a6174b;
        color: white;
        padding: 20px;
        width: 100%;
      ">
        <h1 style="text-align: center">Universidades Participantes</h1>
        <br />
        <div class="logos">
            <div class="logos-slide">
                @foreach ($universidades as $universidad)
                    <img src="{{ $universidad->img }}" alt="logo">
                @endforeach
            </div>
        </div>

        <hr />
        <br />
        <div class="container">
            <div class="row">
                <div class="container text-center">
                    Derechos reservados &copy; Foro International De Turismo |
                    <span id="fecha"></span>
                </div>
                <!-- JavaScript to display the current year -->
                <script>
                    var fecha = new Date();
                    document.getElementById("fecha").innerHTML = fecha.getFullYear();
                </script>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ url('js/efecto.js') }}"></script>
</body>

</html>
