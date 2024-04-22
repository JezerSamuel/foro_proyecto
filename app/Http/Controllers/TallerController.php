<?php

namespace App\Http\Controllers;
use App\Models\Taller;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class TallerController extends Controller
{
    // Método para mostrar el formulario de edición de un taller específico
    public function edit(Taller $taller)
    {
        return view('editar_workshop', compact('taller'));
    }

    // Método para actualizar una workshop específica
    public function update(Request $request, Taller $taller)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
            // Agrega validaciones adicionales según sea necesario
        ]);

        // Procesar la imagen si se ha enviado una nueva
        if ($request->hasFile('logo')) {
            $imagenPath = $request->file('logo')->store('public/assets/imgTaller');
            $imagenUrl = Storage::url($imagenPath);
            // Guardar la URL de la imagen en la workshop
            $taller->img = $imagenUrl;
        }

        // Actualizar los demás campos de la workshop
        $taller->name = $request->name;
        $taller->description = $request->description;
        $taller->capacidad = $request->capacidad;
        $taller->img = $imagenUrl;

        // Guardar los cambios en la base de datos
        $taller->save();

        return redirect()->route('taller')->with('success', '¡La workshop se ha actualizado correctamente!');
    }

    // Método para eliminar una workshop específica
    public function destroy(Taller $taller)
    {
        $taller->delete();

        return redirect()->route('taller')->with('success', '¡La workshop se ha eliminado correctamente!');
    }
}
