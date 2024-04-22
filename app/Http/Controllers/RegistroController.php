<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\File;
use App\Models\Badge;
use App\Models\University;
use App\Models\EventRole;
use App\Models\Taller;
use App\Models\Dato;
use App\Models\Mesa;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Writer\Result\ResultInterface;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistroController extends Controller
{
    public function show()
    {
        $eventRoles = EventRole::all();
        $universidades = University::all();
        $mesas = Mesa::all();
        return view('registroG',compact('universidades','eventRoles','mesas'));
    }

    public function registrarUsuario(Request $request)
    {
        // Verificar si el correo electrónico ya está registrado
        $existingUser = User::where('email', $request->correo)->first();

        if ($existingUser) {
            // Si el correo electrónico ya está registrado, redirigir con un mensaje de error
            return redirect()->back()->with('error', 'El correo electronico que ingreso ya ha sido registrado, intente con uno diferente.');
        }
        
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
            $nombreImagenEncriptado = basename($imagenPath);
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
        
        $dato = Dato::create([
            'user_id' => $usuario->id,
            'imagen' => $nombreImagenEncriptado,
            'university' => $university->name,
            'name' => $usuario->name,
            'apellidoPaterno' => $request->apellido_p,
            'apellidoMaterno' => $request->apellido_m,
            'role' => $eventRole->name,
            'qr' => $qrUrl,
            'folio' => $folio,
        ]);
        $dato->save();

        $pdf = Pdf::loadView('gafete.designG', compact('dato'))->save(public_path('storage/pdfs/'.$usuario->id.'.pdf'));
        return $pdf->download('Gafete.pdf');
        

        // Redirigir a la vista del gafete
        //return view('gafete.designG',compact('request','qrUrl','university','eventRole','imagenUrl','folio'));
    }

    public function registrarUniversidad(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',

        ]);

        $imagenUrl = null;

        // Guardar imagen en la carpeta storage/assets/imgUniversity
        if ($request->hasFile('logo')) {
            $imagenPath = $request->file('logo')->store('public/assets/imgUniversity');
            $imagenUrl = Storage::url($imagenPath);
        }
        

        // Crea una nueva universidad
        $universidad = new University();
        $universidad->name = $request->name;
        $universidad->domain = $request->domain;
        $universidad->img = $imagenUrl;

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

    public function registrarTaller(Request $request)
    {
        $imagenUrl = null;

        // Guardar imagen en la carpeta storage/assets/imgUniversity
        if ($request->hasFile('logo')) {
            $imagenPath = $request->file('logo')->store('public/assets/imgTaller');
            $imagenUrl = Storage::url($imagenPath);
        }

        // Crea un nuevo taller
        $taller = new Taller();
        $taller->name = $request->name;
        $taller->description = $request->description;
        $taller->capacidad = $request->capacity;
        $taller->img = $imagenUrl;

        $taller->save();
        return redirect()->route('registroT');
    }

    public function showFolioForm()
    {
        $universidades = University::all();
        return view('folioValidation',compact('universidades'));
    }
    

    public function showRegistrationForm(Request $request)
    {

        // Obtener el badge correspondiente al folio introducido en el formulario
        $folio = $request->input('folio');
        $badge = Badge::where('folio', $folio)->first();

        // Verificar si se encontró un badge con el folio proporcionado
        if (!$badge) {
            return redirect()->back()->with('error', 'No se encontró un usuario con el folio proporcionado.');
        }

        // Obtener el usuario asociado al badge
        $user_id = $badge->user_id;
        $user = User::find($user_id);

        // Obtener la lista de talleres disponibles
        $talleres = Taller::all();

        //obtener la universidad a la que pertenece
        $universidadU = University::find($user->university_id);
        $universidades = University::all();

        // Retornar la vista con el formulario de registro y la lista de talleres
        return view('registrar_usuario_taller', compact('talleres', 'universidades','universidadU', 'user', 'badge', 'folio'));
        //return redirect('/registro-usuario-evento')->with(compact('talleres', 'universidades','universidadU', 'user', 'badge', 'folio'));
    }

    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'folio' => 'required|string|max:255',
            'taller_id' => 'required|exists:tallers,id',
        ]);

        // Buscar el badge asociado al folio ingresado
        $badge = Badge::where('folio', $request->input('folio'))->first();

        // Verificar si se encontró el badge
        if (!$badge) {
            return back()->with('error', 'No se encontró ningún usuario con el folio ingresado.');
        }

        // Obtener el usuario asociado al badge
        $user_id = $badge->user_id;
        $user = User::find($user_id);

        // Obtener el taller seleccionado por el usuario
        $tallerId = $request->input('taller_id');
        $taller = Taller::find($tallerId);

        // Verificar si el usuario ya está registrado en el taller
        if ($user->talleres()->where('taller_id', $taller->id)->exists()) {
            return back()->with('error', 'El usuario ya está registrado en este taller.');
        }

        // Verificar si hay suficientes espacios disponibles en el taller
        if ($taller->capacidad <= 0) {
            return back()->with('error', 'No hay espacios disponibles en el taller ' . $taller->nombre);
        }

        // Registrar al usuario en el taller
        $user->talleres()->attach($taller);

        // Actualizar los espacios disponibles
        $taller->decrement('capacidad');

        // Redireccionar con un mensaje de éxito
        return redirect()->back()->with('success', 'Usuario registrado en el taller exitosamente.');
    }

    public function testView()
    {
        // Crear usuario
        $dato = Dato::create([
            'user_id' => '2',
            'imagen' => 'equisde',
            'university' => 'Universidad Polictecnica de Bacalar',
            'name' => 'Jezer',
            'apellidoPaterno' => 'Chimal',
            'apellidoMaterno' => 'Ruiz',
            'role' => 'Participante',
            'qr' => 'equisde',
            'folio' => '24-001-002'
        ]);
        $dato->save();

        $pdf = Pdf::loadView('gafete.designG', compact('dato'));
        return $pdf->stream();
        //return view('gafete.designG', compact('dato'));
    }

}
