<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\University;
use App\Models\Badge;
use App\Models\Taller;
use App\Models\EventRole;
use App\Models\Mesa;
use App\Models\Asistencia;

class DashboardController extends Controller
{
    public function showUniversity()
    {
        $universidades = University::all();
        return view('universidad',compact('universidades'));
    }

    public function showWorkshops()
    {
        $workshops = Taller::all();
        return view('workshop', compact('workshops'));
    }

    public function showMesas()
    {
        $mesas = Mesa::all();
        return view('mesa', compact('mesas'));
    }

    public function showAsistencias()
    {
        $asistencias = Asistencia::all();
        $workshops = Taller::all();
        $mesas = Mesa::all();
        return view('asistencias', compact('asistencias','workshops','mesas'));
    }

    public function showUsers()
    {
        $workshops = Taller::all();
        $mesas = Mesa::all();
        $usuarios = User::all();
        $badges = Badge::all();
        $roles = EventRole::all();
        $universidades = University::all();
        return view('usuarios', compact('workshops','mesas','usuarios','badges','roles','universidades'));
    }
}
