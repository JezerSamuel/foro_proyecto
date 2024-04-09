<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro Internacional del Turismo</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/stylesForm.css') }}">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <style>
        /* Aplica los estilos CSS personalizados aquí */
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            
        }


        main{
    background-image: url(/img/background.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: 100% 120%, auto;
}

body{
    background-image: url(/img/contenido.jpg);
    background-repeat: repeat-y;
    background-position: center;
    background-size: 100% 100%, auto;
}

#banner{
    width: 50%;
}

#navbar{
    background-color: #A6174B;
}

.me-10{
    margin-right: 150px;
}

.boton{
    background: #A6174B;
    width: 100%;
    cursor: pointer;
}

.contenido{
    height: 1000px;
}

        
    </style>
</head>
<body>
    <div id="navbar">
        <img src="{{ asset('storage/assets/imgForm/banner_corregido.jpg') }}" alt="banner" id="banner">
    </div>
    <main class="text-center" style="padding-top: 300px">
        <div
            class="container bg-light mt-5 rounded border border-1 border-black p-5"
            style="width: 75%; padding-bottom: 40px; background-color: #22222286"
        >
            <div
                style="background-color: #a6174b"
                class="container-fluid text-light p-2 text-center"
            >
                <div>
                    <h1>Formulario de registro a talleres</h1>
                </div>
            </div>
            <br />
            <div class="" style="text-align: left">
                <h3>
                    Por favor, complete el siguiente formulario con la informacion
                    solicitada:
                </h3>
                <br />
            </div>

            <div class="row">
                <!-- Formulario -->
                <div class="col-md-6">
                    <form action="{{ route('registrar.usuario.evento') }}" method="post" style="text-align: left">
                        @csrf
                        <!-- Seccion para el folio -->
                        <div class="mb-3">
                            <label for="folio" class="form-label fw-bold">Folio:</label>
                            <input type="text" class="form-control" id="folio" name="folio" required>
                        </div>
                        <!-- Seccion para los talleres -->
                        <label>Selecciona los talleres:</label><br>
                        @foreach ($talleres as $taller)
                            <div class="card">
                                <input type="checkbox" id="taller_{{ $taller->id }}" name="talleres[]" value="{{ $taller->id }}">
                                <label for="taller_{{ $taller->id }}">
                                    <h2>{{ $taller->name }}</h2>
                                    <p><strong>Descripción:</strong> {{ $taller->description }}</p>
                                    <p><strong>Espacios Disponibles:</strong> {{ $taller->capacidad }}</p>
                                    <!--logo del taller-->
                                    <img src="{{ $taller->img }}" alt="logo" width="100">
                                </label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
            <br /><br />
        </div>
    </main>
    <!-- Pie de página -->
    <!-- Incluye aquí el código del pie de página si es necesario -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ url('js/efecto.js') }}"></script>
</body>
</html>
