<?php
namespace App\Http\Controllers;
class CalendarController extends Controller
{
    public function calendar() 
    { 
        $this->authorize('calendar');
        return view('calendar');
    }
}