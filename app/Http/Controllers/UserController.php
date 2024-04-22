<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Badge;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request, $id)
    {
        $user=User::find($id);

        $user->name = $request->name;
        $user->apellidoPaterno = $request->apellidoPaterno;
        $user->apellidoMaterno = $request->apellidoMaterno;
        $user->university_id = $request->university_id;
        $user->email = $request->email;
        $user->telefono = $request->telefono;

        // Guardar los cambios en la base de datos
        $user->save();

        return redirect()->route('usuarios')->with('success', '¡El usuario se ha actualizado correctamente!');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('usuarios')->with('success', '¡La universidad se ha eliminado correctamente!');
    }
}