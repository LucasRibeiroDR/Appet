<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view-appointment');
        return view('appointments.appointments');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create-appointment');
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
        $this->authorize('create-appointment');

        $request->validate([
            'pet_id' => 'required',
            'timeslot' => 'required',
            'area_consulta' => 'required',
            'descricao' => 'required',
        ]);

        $appointments = new Appointment;

        $appointments->user_id = auth()->user()->id;
        $appointments->pet_id = $request->pet_id;

        $appointments->date = $request->date;
        $appointments->timeslot = $request->timeslot;
        $appointments->area_consulta = $request->area_consulta;
        $appointments->descricao = $request->descricao;

        $appointments->save();

        return redirect('appointments/show')->with('msg', 'Agendado com sucesso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $this->authorize('view-appointment');
        $user = auth()->user();
        $appointments = $user->appointments;

        return view('appointments.show', [
            "appointments" => $appointments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin-edit-appointment');

        $user = auth()->user();
        $pets = $user->pets;
        $appointment = Appointment::findOrFail($id);
        if($user->id != $appointment->user_id) {
            return redirect('/appointments/show');
        }
        return view('appointments.edit', [
            'appointment' => $appointment,
            'pets' => $pets
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
        $this->authorize('admin-edit-appointment');
        $data = $request->all();
        Appointment::findOrFail($request->id)->update($data);
        return redirect('/appointments/show')->with('msg', 'Consulta atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete-appointment');
        Appointment::findOrFail($id)->delete();
        return redirect('/appointments/show')->with('msg', 'Consulta cancelada com sucesso!');;
    }
}
