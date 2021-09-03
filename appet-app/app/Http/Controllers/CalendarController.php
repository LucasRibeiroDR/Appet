<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Pet;
use App\Models\Appointment;
use App\Models\Calendar;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function calendar() 
    { 
        return view('calendar');
    }
}
