<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Badge;
use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaGeneral extends Component
{
    public $folio = "";
    public $message = "";
    
    public function search()
    {
        $badges = Badge::all();

        if (Badge::where('folio', '=', $this->folio)->exists()) {
            $badge = Badge::where('folio', $this->folio)->first();
            $asistencia = Asistencia::create([
                'asistencia' => '1',
                'user_id' => $badge->user_id,
                'event_id' => '0',
            ]);
            $this->message='Usuario Ingresado';
        }else{
            $this->message='Usuario no encontrado';
        }

        
        //$badge = Badge::where('folio', $this->folio)->first();
        
        


        /*
        foreach($badges as $badge){
            if($badge->folio == $this->folio){
                $id = $badge->user_id;
                $asistencia = Asistencia::create([
                    'asistencia' => '1',
                    'user_id' => $id,
                    'event_id' => '0',
                ]);
                $this->message='Usuario Ingresado';
            }
        }
        */
        $this->folio = "";
    }

    public function render()
    {
        $badge = Badge::all();
        return view('livewire.asistencia-general', compact('badge'));
    }
}