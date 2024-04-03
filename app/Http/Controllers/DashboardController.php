<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\University;
use App\Models\Badge;
use App\Models\Taller;
use App\Models\EventRole;

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
}
