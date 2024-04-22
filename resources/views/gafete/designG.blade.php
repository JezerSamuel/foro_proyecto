<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gafetes</title>
  <style>
/* Estilos generales */
*{
padding: 0;
margin: 0;
font-family: Arial, Helvetica, sans-serif;
}


header {
    background-image: url(imgGafete/encabezado_img.png);
    background-size: cover;
    background-position: center;
    height: 60px; /* Ajusta la altura según sea necesario */
}


.logo{
    width: 90%;
}

.tamañoimg{
    width: 100px;
    margin: 0 auto;
}

hr{
    color: rgb(89, 2, 18);
    background-color: rgb(89, 2, 18);
    height: 2px;
}

footer {
    background-image: url(imgGafete/footer_foro.png);
    color: white; /* Color del texto */
    background-size: cover;
    background-position: center;
    height: 48px; /* Ajusta la altura según sea necesario */
    text-align: center; /* Centra el texto */
    line-height: 48px; /* Alinea verticalmente el texto en el centro */
}


.upb{
    width: 20%;
}

.gafete{
    width: 10cm;
    height: 13.5cm;
    padding: 10px; /* Agregado para separar el contenido del borde */
    box-sizing: border-box; /* Incluye padding en el ancho y alto */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.user-info {
    flex-grow: 1; /* Hace que esta sección ocupe el espacio restante */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center; /* Centra el texto */
}

.user-info h4, .user-info p {
    margin: 0; /* Elimina el margen de los elementos h4 y p */
}

.user-info img {
    max-width: 100%;
    max-height: 100%;
    margin: 0 auto; /* Centra la imagen horizontalmente */
}

.border{
    border: 1px solid;
}

.margen{
    margin-left: 160px;
}
  </style>
</head>

<body>
    <div class="margen mt-4 d-flex justify-content-center">
 
     <div class="border border-black gafete">
         <header class="py-2">
             &nbsp;
         </header>
 
         <div class="justify-content-center">
             <div style="width: 9cm; margin-left: 18px;"><br>
                 <img src="imgGafete/logo_foro.png" alt="" class="mt-3" style="width: 100%;">
                 <hr>
             </div>
         </div>
 
         <div class="text-center">
             <h3 style="font-size: 25px; position: relative;"> <center>{{ $dato->university }}</center></h3> <!-- En esta seccion va la universidad-->
             <div style="width: 5cm; margin: 0 auto;" class="mx-auto d-block my-3 text-center">
                 <center><img src="storage/img/{{ $dato->imagen }}" alt="" style="margin: 0 auto;" height="160"> </center> <!-- En esta seccion va la imagen del usuario-->
             </div>
             <h4 class="fw-bold" style="font-size: 20px;"> <center>{{ $dato->name}}</center></h4> <!-- En esta seccion va el nombre del usuario-->
             <p style="margin-bottom: 18px;"><center>{{ $dato->role}}</center></p> <!-- En esta seccion va el rol del usuario-->
         </div>
 
         
         <footer class="encabezado_img.png  d-flex align-items-center justify-content-center">
             <h5 class="">Bacalar, Q. Roo</h5> <!-- En esta seccion va el estado y la ciudad del usuario que se toma en base a la direccion de la universidad-->
         </footer>
     </div>
     
     <div>
        &nbsp;
     </div>
 
     <div class="border border-black m-0 p-0 ms-2 gafete">
         <header class="py-2">
             &nbsp;
         </header>
 
         <div class="justify-content-center">
             <div style="width: 9cm; margin-left: 18px;"><br>
                 <img src="imgGafete/logo_foro.png" alt="" class="mt-3" style="width: 100%;">
                 <hr>
             </div>
         </div>
 
         <div class="text-center" style="margin-bottom: 40px;">
            <div style="width: 200px; margin: 0 auto" class="mx-auto d-block mt-3 mb-2"><br>
                <img src="storage/qr-codes/{{ $dato->qr }}" alt="" class="tamañoimg" height="200"> <!-- En esta seccion va el qr del usuario-->
            </div>
            <p><center>{{ $dato->folio }}</p>
        </div>
         
        <footer class="text-center text-white py-2 d-flex align-items-center">
            <div style="width: 5cm; margin: 0 auto;" class="mx-auto d-block logo-upb">
                <img src="imgGafete/logo_upb.png" alt="" class="upb">
            </div>
        </footer>
     </div>
 </div>
 
 </body>
</html>
