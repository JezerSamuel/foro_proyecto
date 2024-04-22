<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;
use App\Models\University;
use App\Models\Badge;
use App\Models\Taller;
use App\Models\EventRole;
use App\Models\Mesa;
use App\Models\Asistencia;

class UserData extends ModalComponent
{
    public User $usuario;

    public function mount()
    {
        $this->usuario;
    }

    public function render()
    {
        $usuarios = $this->usuario;
        $workshops = Taller::all();
        $mesas = Mesa::all();
        $badges = Badge::all();
        $eventRoles = EventRole::all();
        $universidades = University::all();
        return view('livewire.user-data', compact('workshops','mesas','usuarios','badges','eventRoles','universidades'));
    }
}
