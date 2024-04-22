<?php

namespace App\Http\Controllers;
use App\Models\Mesa;

use Illuminate\Http\Request;

class MesaController extends Controller
{
    // Método para mostrar el formulario de edición de una mesa específica
    public function edit(Mesa $mesa)
    {
        return view('editar_mesa', compact('mesa'));
    }

    // Método para actualizar una mesa específica
    public function update(Request $request, Mesa $mesa)
    {

        // Actualizar los demás campos de la mesa
        $mesa->nombre = $request->name;
        // Guardar los cambios en la base de datos
        $mesa->save();

        return redirect()->route('mesa')->with('success', '¡La mesa se ha actualizado correctamente!');
    }

    // Método para eliminar una mesa específica
    public function destroy(Mesa $mesa)
    {
        $mesa->delete();

        return redirect()->route('mesa')->with('success', '¡La mesa se ha eliminado correctamente!');
    }
}
