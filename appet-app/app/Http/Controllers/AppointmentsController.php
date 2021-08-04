<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;


class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointments.appointments');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $pets = $user->pets;

        return view ('appointments.create', ['user'=>$user, 'pets'=>$pets]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointments = new Appointment;

        $appointments->horario = Carbon::now();
        $appointments->user_id = auth()->user()->id;
        $appointments->pet_id = $request->animal;
        
        // $appointments->date = $request->date;
        
        $appointments->save();

        return redirect('appointments/show');
        // return redirect('appointments/show')->with('msg', 'Agendado com sucesso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = auth()->user();
        $appointment = $user->appointments;
        //dd($user->appointments);
        return view('appointments.show', ["appointment" => $appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        $appointment = Appointment::findOrFail($id);
        if($user->id != $appointment->user_id) {
            return redirect('/appointments/show');
        }
        return view('appointments.edit', [
            'appointment' => $appointment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        Appointment::findOrFail($request->id)->update($data);
        return redirect('/appointments/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Appointment::findOrFail($id)->delete();
        return redirect('/appointments/show');
    }
}
