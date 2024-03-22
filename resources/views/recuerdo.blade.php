<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro internacional del turismo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/stylesForm.css') }}">
</head>
<body>
    <main class="text-center">
        <div id="navbar">
            <img src="{{ asset('storage/assets/imgForm/banner_corregido.jpg') }}" alt="banner" id="banner">
        </div>
        <div class="info bg-light mt-5 rounded border border-1 border-black float-sm-end me-5" style="width: 15%;">
            Informacion
        </div>
        <div class="container bg-light mt-5 rounded border border-1 border-black p-5" style="width: 50%;">
            <div style="background-color: #A6174B;" class="container-fluid text-light p-2 text-center"><h1>Formulario de registro</h1></div>
            <br>
            <h3>Llene el formulario con lo que se le solicita</h3><br>
            <form action="{{ url('/registroG') }}" method="post" enctype="multipart/form-data" style="text-align: left;">
                @csrf
                <!-- Seccion para el nombre-->
                <div class="mb-3">
                    <label for="nombre" class="form-label fw-bold">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <!-- Seccion para los apellidos-->
                <div class="mb-3">
                    <label for="apellido-p" class="form-label fw-bold">Apellido paterno:</label>
                    <input type="text" class="form-control" id="apellido_p" name="apellido_p">
                </div>
                <div class="mb-3">
                    <label for="apellido-m" class="form-label fw-bold">Apellido materno:</label>
                    <input type="text" class="form-control" id="apellido_m" name="apellido_m">
                </div>
                <!-- Seccion para las universidades-->
                <div class="mb-3">
                    <label for="universidad" class="fw-bold">Universidad de procedencia:</label>
                    <select class="form-select mb-3" id="universidad" name="universidad" aria-label="Default select example">
                        <option selected> - Seleccione una universidad - </option>
                        <!-- lista de universidades generada dinamicamente-->
                        @foreach ($universidades as $universidad)
                            <option value="{{ $universidad->id }}">{{$universidad->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Seccion para el tipo de participante -->
                <label for="tipo-de-participante" class="fw-bold">Tipo de participante:</label>
                @foreach ($eventRoles as $eventRole)
                    <div class="form-check mb-3 form-check-inline ms-5">
                        <input class="form-check-input" type="radio" name="flexRadioRole" id="{{ $eventRole->name }}" value="{{ $eventRole->id }}">
                        <label class="form-check-label" for="{{ $eventRole->name }}">
                          {{ $eventRole->name }}
                        </label>
                    </div>
                @endforeach

                <!-- Seccion para el topic, este campo solo es visible si el usuario selecciona el campo conferencista en el formulario-->
                <div class="mb-3" id="topicField" style="display: none;">
                    <label for="topic" class="form-label fw-bold">Topic:</label>
                    <input type="text" class="form-control" id="topic" name="topic">
                </div>
                  
                <!-- Seccion para la foto del participante -->
                <div class="mb-3">
                    <label for="formFile" class="form-label fw-bold">Ingrese su foto de perfil</label>
                    <input class="form-control-file" type="file" id="formFile" name="foto">
                    <div class="form-text">* importante, esta imagen aparecera en su gafete y servira para identificarlo. Intente que la imagen sea lo mas clara posible.</div>
                </div>
                <!-- Seccion para el correo-->
                <div class="mb-3">
                    <label for="correo" class="form-label fw-bold">Correo electronico:</label>
                    <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Este correo servira para contactarlo de ser necesario</div>
                </div>
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </form>
        </div>
    </main>

    <script>
        // Obtener los radio buttons
        const radioButtons = document.querySelectorAll('input[name="flexRadioRole"]');

        // Obtener el campo topic
        const topicField = document.getElementById('topicField');

        // Agregar event listener a cada radio button
        radioButtons.forEach(function(radioButton) {
            radioButton.addEventListener('change', function() {
                // Si el radio button de conferencista está seleccionado, mostrar el campo topic, de lo contrario ocultarlo
                if (radioButton.value == "3" && radioButton.checked) {
                    topicField.style.display = 'block';
                } else {
                    topicField.style.display = 'none';
                }
            });
        });
    </script>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>