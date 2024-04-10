<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro Internacional de Turismo</title>
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
            <div class="" style="text-align: center">
                <h3>
                    Por favor ingrese su folio
                </h3>
                <br />
            </div>

            <div class="row">
                <!-- Formulario -->
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form action="{{ route('validar.folio') }}" method="post" style="text-align: center">
                        @csrf
                        <!-- Seccion para el folio -->
                        <div class="mb-3">
                            <label for="folio" class="form-label fw-bold">Folio:</label>
                            <input type="text" class="form-control" id="folio" name="folio" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Continuar</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
            <br /><br />
        </div>
    </main>
    <!-- Pie de página -->
    <footer
      class="footer"
      style="
        background-color: #a6174b;
        color: white;
        padding: 20px;
        width: 100%;
      "
    >
      <h1 style="text-align: center">Universidades Participantes</h1>
      <br />
      <div class="logos">
        <div class="logos-slide">
          @foreach ($universidades as $universidad)
            <img src="{{$universidad->img}}" alt="logo">
          @endforeach
        </div>
      </div>

      <hr />
      <br />
      <div class="container">
        <div class="row">
          <div class="container text-center">
            Derechos  reservados &copy; Foro International De Turismo |
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

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="{{ url('js/efecto.js') }}"></script>
</body>
</html>
