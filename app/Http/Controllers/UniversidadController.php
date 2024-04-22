<?php

namespace App\Http\Controllers;
use App\Models\University;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class UniversidadController extends Controller
{
    // Método para mostrar el formulario de edición de una universidad específica
    public function edit(University $universidad)
    {
        return view('editar_universidad', compact('universidad'));
    }

    // Método para actualizar una universidad específica
    public function update(Request $request, University $universidad)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
            // Agrega validaciones adicionales según sea necesario
        ]);

        // Procesar la imagen si se ha enviado una nueva
        if ($request->hasFile('logo')) {
            $imagenPath = $request->file('logo')->store('public/assets/imgUniversity');
            $imagenUrl = Storage::url($imagenPath);
            // Guardar la URL de la imagen en la universidad
            $universidad->img = $imagenUrl;
        }

        // Actualizar los demás campos de la universidad
        $universidad->name = $request->name;
        $universidad->domain = $request->domain;

        // Guardar los cambios en la base de datos
        $universidad->save();

        return redirect()->route('universidad')->with('success', '¡La universidad se ha actualizado correctamente!');
    }

    // Método para eliminar una universidad específica
    public function destroy(University $universidad)
    {
        $universidad->delete();

        return redirect()->route('universidad')->with('success', '¡La universidad se ha eliminado correctamente!');
    }
}
