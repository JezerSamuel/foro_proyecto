<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gafete</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
    <!-- Bootstrap - CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

</head>

<body>
    <div  class="mt-4 d-flex justify-content-center" id="content">
        <div class="border border-black gafete">
            <header class="py-2">
                &nbsp;
            </header>

            <div class="justify-content-center">
                <div style="width: 9cm; margin-left: 18px;">
                    <img src="{{ asset('storage/assets/imgGafete/logo_foro.png') }}" alt="" class="mt-3" style="width: 100%;">
                    <hr>
                </div>
            </div>

            <div class="text-center">
                <h4 style="font-size: 25px; position: relative;">{{ $university->name }}</h4>
                <!-- En esta seccion va la universidad-->
                <div style="width: 5cm;" class="mx-auto d-block my-3">
                    <img src="{{ asset($imagenUrl) }}" alt="" class="w-100">
                    <!-- En esta seccion va la imagen del usuario-->
                </div>
                <h4 class="fw-bold" style="font-size: 20px;">{{ $request->nombre}}</h4>
                <!-- En esta seccion va el nombre del usuario-->
                <p style="margin-bottom: 18px;">{{ $eventRole->name}}</p>
                <!-- En esta seccion va el rol del usuario-->
            </div>

            <footer class="text-center text-white py-2">
                <h5>Bacalar, Q. Roo</h5>
                <!-- En esta seccion va el estado y la ciudad del usuario que se toma en base a la direccion de la universidad-->
            </footer>
        </div>

        <div class="border border-black m-0 p-0 ms-2 gafete">
            <header class="py-2">
                &nbsp;
            </header>

            <div class="justify-content-center">
                <div style="width: 9cm; margin-left: 18px;">
                    <img src="{{ asset('storage/assets/imgGafete/logo_foro.png') }}" alt="" class="mt-3" style="width: 100%;">
                    <hr>
                </div>
            </div>

            <div class="text-center" style="margin-bottom: 46px;">
                <div style="width: 200px;" class="mx-auto d-block mt-3 mb-2">
                    <div id="qr-code"></div>
                    <!-- En esta seccion va el qr del usuario-->
                </div>
                <p>{{ $folio }}</p>
            </div>
            <footer class="text-center text-white py-2">
                <div style="width: 5cm;" class="mx-auto d-block">
                    <img src="{{ asset('storage/assets/imgGafete/logo_upb.png') }}" alt="" class="upb">
                </div>
            </footer>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el valor de $folio
            const folio = "{{ $folio }}";

            // Generar la URL del código QR
            const qrCodeUrl = `https://api.qrserver.com/v1/create-qr-code/?data=${encodeURIComponent(folio)}&size=200x200`;

            // Mostrar el código QR
            const qrCodeContainer = document.getElementById('qr-code');
            const qrImage = new Image();
            qrImage.src = qrCodeUrl;
            qrCodeContainer.appendChild(qrImage);

            // Esperar un breve período de tiempo antes de generar el PDF
            setTimeout(function() {
                downloadPDF();
            }, 7000); // Esperar 1 segundo (1000 milisegundos)

            // Función para descargar automáticamente el contenido en formato PDF
            const downloadPDF = () => {
                const element = document.getElementById('content');
                html2pdf()
                    .from(element)
                    .save();
            };
        });
    </script>

</body>
</html>
