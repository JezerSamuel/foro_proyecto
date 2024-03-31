<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\File;
use App\Models\Badge;
use App\Models\University;
use App\Models\EventRole;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Writer\Result\ResultInterface;

class RegistroController extends Controller
{
    public function show()
    {
        $eventRoles = EventRole::all();
        $universidades = University::all();
        return view('registroG',compact('universidades','eventRoles'));
    }

    public function registrarUsuario(Request $request)
    {
        
        // Crear usuario
        $usuario = User::create([
            'name' => $request->nombre,
            'apellidoPaterno' => $request->apellido_p,
            'apellidoMaterno' => $request->apellido_m,
            'university_id' => $request->universidad,
            'email' => $request->correo,
            'role' => $request->flexRadioRole,
            'password' => bcrypt('12345678'), // Contraseña predeterminada
            'telefono' => $request->numero,
        ]);

        $imagenUrl = null;

        // Guardar imagen en la carpeta storage/img
        if ($request->hasFile('foto')) {
            $imagenPath = $request->file('foto')->store('public/img');
            $imagenUrl = Storage::url($imagenPath);
        }

        // Crear folio
        $folio = '24-' . str_pad($request->universidad, 3, '0', STR_PAD_LEFT) . '-' . str_pad($usuario->id, 3, '0', STR_PAD_LEFT);


        $writer = new PngWriter();

        // Inicializar la variable $qrUrl

        try {
            // Crear código QR con el valor del folio
            $qrCode = QrCode::create($folio)
                ->setSize(300) // Tamaño del código QR
                ->setMargin(10); // Margen

            // Guardar el código QR como una imagen
            $qrPath = 'app/public/qr-codes/' . $usuario->id . '_qr.png';

            // Crear el directorio de destino si no existe
            $qrDirectory = dirname(storage_path($qrPath));
            if (!file_exists($qrDirectory)) {
                mkdir($qrDirectory, 0777, true);
            }

            // Generar el código QR como una imagen PNG
            $result = $writer->write($qrCode);

            // Guardar el código QR como una imagen
            file_put_contents(storage_path($qrPath), $result->getString());

            // Obtener la URL del código QR
            $qrUrl = $usuario->id . '_qr.png';

        } catch (\Throwable $e) {
            // Manejar excepciones
            echo 'Error: ' . $e->getMessage();
        }

        //Proceso en el cual se verifica el rol de usuario y se asigna el topic en caso de ser ususario especial
        $topic = null;
        $mesa = null;
        if ($request->flexRadioRole == 2) {
            $topic = $request->topic;
        }
        if ($request->flexRadioRole == 3) {
            $mesa = $request->mesa;
        }

        // Crear gafete
        $gafete = Badge::create([
            'user_id' => $usuario->id,
            'university_id' => $request->universidad,
            'event_role_id' => $request->flexRadioRole,
            'registration_date' => now(), // Fecha actual
            'valid_until' => now()->addYear(), // Fecha de expiración (1 año después)
            'imagen' => $imagenUrl, // URL de la imagen
            'folio' => $folio, // Folio
            'topic' => $topic, // Tema de la conferencia
            'mesa' => $mesa, // Número de mesa
            'qrUrl' => $qrUrl, // URL del código QR
        ]);

        $idRole = $request->flexRadioRole; // Obtener el ID del rol de ususario
        $eventRole = EventRole::find($idRole); // Busca el registro de EventRole con el ID especificado

        $idUniversity = $request->universidad; // Obtener el ID de la universidaad
        $university = University::find($idUniversity); // Busca el registro de University con el ID especificado

        // Redirigir a la vista del gafete
        return view('gafete.diseñoG',compact('request','qrUrl','university','eventRole','imagenUrl','folio'));
    }

    public function registrarUniversidad(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
        ]);

        // Crea una nueva universidad
        $universidad = new University();
        $universidad->name = $request->name;
        $universidad->domain = $request->domain;

        $universidad->save();

        return redirect()->route('registroU');
    }

    public function registrarRol(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Crea una nueva universidad
        $eventRole = new EventRole();
        $eventRole->name = $request->name;

        $eventRole->save();

        return redirect()->route('registroER');
    }
}
