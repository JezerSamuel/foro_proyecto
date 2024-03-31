<!-- 
    Desarrolladores de Proyecto:
     Javier Johan Keme Correa 
     Jezer Samuel Chimal Ruiz
     Rafael Buitron Hau
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            <h1>Formulario de registro</h1>
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
            <form action="{{ url('/registroG') }}" method="post" enctype="multipart/form-data" style="text-align: left">
            @csrf
              <!-- Seccion para el nombre-->
              <div class="mb-3">
                <label for="nombre" class="form-label fw-bold">Nombre:*</label>
                <input
                  type="text"
                  class="form-control"
                  id="nombre"
                  name="nombre"
                  placeholder="Nombre"
                  required
                />
              </div>
              <!-- Seccion para los apellidos-->
              <div class="mb-3">
                <label for="apellido-p" class="form-label fw-bold"
                  >Apellido paterno:*</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="apellido-p"
                  name="apellido_p"
                  placeholder="Apellido Paterno"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="apellido-m" class="form-label fw-bold"
                  >Apellido materno:*</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="apellido-m"
                  name="apellido_m"
                  placeholder="Apellido Materno"
                  required
                />
              </div>
              <!-- Seccion para las universidades-->
              <div class="mb-3">
                <label for="universidad" class="fw-bold"
                  >Universidad de procedencia:*</label
                >
                <select
                  class="form-select mb-3"
                  aria-label="Default select example"
                  name="universidad"
                >
                  <option selected>- Seleccione una universidad -</option>
                  <!-- lista de universidades generada dinamicamente-->
                  @foreach ($universidades as $universidad)
                     <option value="{{ $universidad->id }}">{{$universidad->name}}</option>
                  @endforeach
                </select>
              </div>

              <!-- Seccion para el tipo de participante -->
              <label for="tipo-de-participante" class="fw-bold"
                >Tipo de participante:*</label
              ><br />
              @foreach ($eventRoles as $eventRole)
                <div class="form-check mb-3 form-check-inline ms-5">
                    <input
                    class="form-check-input"
                    type="radio"
                    name="flexRadioRole"
                    id="{{ $eventRole->name }}"
                    value="{{ $eventRole->id }}"
                    />
                    <label class="form-check-label" for="{{ $eventRole->name }}">
                    {{ $eventRole->name }}
                    </label>
                </div>
              @endforeach
              
              
              <br />

              <div id="ponenteField" style="display: none">
                <label for="nombre-ponencia" class="form-label fw-bold"
                  >Nombre de la ponencia:*</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="nombre-ponencia"
                  placeholder="Ponencia"
                  name="topic"
                />
              </div>

              <div id="expositorField" style="display: none">
                <label for="mesa-participacion" class="fw-bold"
                  >Seleccione la mesa de participacion:*</label
                >
                <select
                  class="form-select mb-3"
                  aria-label="Default select example"
                  name="mesa"
                >
                  <option selected>--selecione una mesa--</option>
                  <!-- los siguientes son ejemplos, reemplazalos con datos reales y borra este comentario-->
                  <option value="1">
                    Turismo de bienestar, salud e inclusivo
                  </option>
                  <option value="2">Turismo, gastronomía y enología</option>
                  <option value="3">
                    Turismo rural, ecoturismo y turismo comunitario
                  </option>
                  <option value="4">
                    Gentrificación, población flotante y turístificación
                  </option>
                  <option value="5">
                    Experiencias turísticas y pueblos mágicos
                  </option>
                  <option value="6">
                    Gestión, competitividad y mercadotécnia turística
                  </option>
                </select>
              </div>

              <!-- Seccion para la foto del participante -->
              <div class="mb-3">
                <label for="formFile" class="form-label fw-bold"
                  >Ingrese su fotografia para su gafete del evento</label
                >
                <input class="form-control-file" type="file" id="formFile" name="foto" />
                <!-- Button trigger modal -->
                <button
                  type="button"
                  class="btn"
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"
                >
                  <img
                    src="{{ asset('storage/assets/imgForm/interrogatorio.png') }}"
                    alt=""
                    style="height: 30px"
                  />
                </button>
                <div class="form-text">
                  * Importante, esta imagen aparecerá en su gafete y servirá
                  para identificarlo. Intente que la imagen sea lo más clara
                  posible.
                </div>
              </div>
              <!-- Seccion para el correo-->
              <div class="mb-3">
                <label for="correo" class="form-label fw-bold"
                  >Correo electronico:*</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="correo"
                  name="correo"
                  aria-describedby="emailHelp"
                  placeholder="ejemplo@gmail.com"
                  required
                />
                <div id="emailHelp" class="form-text">
                  Este correo servirá para contactarlo en caso necesario.
                </div>
              </div>
              <div>
                <label for="numero" class="form-label fw-bold"
                  >Numero-telefonica</label
                >
                <input
                  type="text"
                  name="numero"
                  id="numero"
                  name="numero"
                  class="form-control"
                  placeholder="+52 983 123 4567"
                />
                <div id="numero" class="form-text">
                  Este numero servirá para contactarlo en caso necesario.
                </div>
              </div>
              <br />
              <button
                type="submit"
                class="btn btn-primary"
                style="background-color: #a6174b"
              >
                Enviar
              </button>
            </form>
          </div>
          <br />
          <!-- Información adicional -->
          <div class="col-md-5">
            <!-- Columna 1 -->
            <div
              style="
                background-color: #f0f0f0;
                padding: 20px;
                border-radius: 10px;
                text-align: left;
              "
            >
              <!-- Contenido columna 1 -->
              <h4>¿Necesita más información? Contáctenos:</h4>
              <a href="https://maps.app.goo.gl/59iMvCGkqFVKUtpi6">
                <img src="{{ asset('storage/assets/imgForm/marcador.png') }}" alt="" style="height: 50px" />
              </a>
              <span style="vertical-align: middle"
                >Avenida 39, REG 12 MZ 325 LT 1 entre calle 56 y 46-A,
                C.P.77930, Bacalar, Quintana Roo, Mexico.</span
              >
              <br /><br />
              <img
                src="{{ asset('storage/assets/imgForm/llamada-telefonica (1).png') }}"
                alt=""
                style="height: 50px"
              />
              <span style="vertical-align: middle"
                >983 128 1591 Extension 1009</span
              ><br /><br />
              <img
                src="{{ asset('storage/assets/imgForm/sobre.png') }}"
                alt=""
                style="height: 50px"
                onclick="copyEmail()"
              />
              <span style="vertical-align: middle"
                >registro4FIT@upb.edu.mx</span
              >
            </div>
            <br /><br /><br />
            <!-- Columna 2 -->
            <div
              style="
                background-color: #f0f0f0;
                padding: 20px;
                border-radius: 10px;
                text-align: center;
              "
            >
              <!-- Contenido columna 1 -->
              <h4 style="text-align: left;">Siga el evento en nuestras redes sociales:</h4>
              <br>
              <hr>
              <br>
              <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FForoInterTurismo.mx%2Fposts%2Fpfbid02PM6x3hpsg2pidBTLU3WNyuJvcMGfajdqPD497851Mg7VRw2u5KyXAthSCRv8YMTPl&width=350&show_text=true&height=825&appId" width="350" height="825" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
              <br>
              <hr>
              <br>
              <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FForoInterTurismo.mx%2Fposts%2Fpfbid0acj7btpBQ3agAhJrWRy1P5a7KyAKPfbLChpG9aDNS5uyLfL1w7bDCPidNhtCiNMCl&width=350&show_text=true&height=453&appId" width="350" height="453" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
              <br>
              <hr>
              <br>
              <br>
            </div>
          </div>
        </div>
        <br /><br />
        <h6>
          Una vez registrado podrás realizar tu inscripción a los talleres.
        </h6>
      </div>
    </main>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #a6174b">
            <h1
              class="modal-title fs-5"
              id="exampleModalLabel"
              style="color: #ffffff"
            >
              Para subir la fotografia de su gafete tenga en cuenta las
              siguientes recomendaciones:
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="col">
              <div style="text-align: left">
                1. El archivo de la fotografía debe ser jpg o png (tener
                extensión .jpg, .png) y un tamaño no mayor a 1MB. <br />
                2. En caso de tener dudas puede enviar un correo electrónico a
                fit2024@upb.edu.mx <br />
                3. Una vez subida la fotografía no es posible reemplazarla.
                <br />
                Cualquier duda o aclaración no dude en ponerse en contacto con
                nosotros. <br />
                <!-- foto ejemplo -->
                <br />
                <hr />
                <h5 style="font-weight: bold; text-align: center">
                  Foto para gafete
                </h5>
                <div class="foto" style="text-align: center">
                  <!-- Applied text-align: center; here -->
                  <img src="{{ asset('storage/assets/imgForm/prof.png') }}" alt="" style="height: 300px" />
                </div>
                <hr />
                <div style="text-align: center">
                  <h6>De preferencia una imagen sin fondo</h6>
                </div>
                <br />
                <h6>Asegurarse de:</h6>
                Imagen de buena calidad <br />
                Imagen con buena iluminación <br />
                Imagen sin sombras
              </div>
            </div>
          </div>
          <div class="modal-footer" style="background-color: #a6174b">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
              style="background-color: #ffffff; color: black"
            >
              Cerrar
            </button>
          </div>
        </div>
      </div>
    </div>

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
          <img src="{{ asset('storage/assets/imgForm/upblogo.jpg') }}" />
          <img src="{{ asset('storage/assets/imgForm/upblogo.jpg') }}" />
          <img src="{{ asset('storage/assets/imgForm/upblogo.jpg') }}" />
          <img src="{{ asset('storage/assets/imgForm/upblogo.jpg') }}" />
          <img src="{{ asset('storage/assets/imgForm/upblogo.jpg') }}" />
          <img src="{{ asset('storage/assets/imgForm/upblogo.jpg') }}" />
          <img src="{{ asset('storage/assets/imgForm/upblogo.jpg') }}" />
          <img src="{{ asset('storage/assets/imgForm/upblogo.jpg') }}" />
          <img src="{{ asset('storage/assets/imgForm/upblogo.jpg') }}" />
          <img src="{{ asset('storage/assets/imgForm/cruz.png') }}" />
        </div>
      </div>

      <hr />
      <br />
      <div class="container">
        <div class="row">
          <div class="container text-center">
            Derechos &copy; Foro International De Turismo |
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
<!-- 
    Desarrolladores de Proyecto:
     Javier Johan Keme Correa 
     Jezer Samuel Chimal Ruiz
     Rafael Buitron Hau
-->
