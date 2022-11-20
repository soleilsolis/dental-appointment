<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $appointments = Auth::user()->type !== 'patient' 
                    ? Appointment::all()
                    : Appointment::where('user_id', '=', Auth::id())
                        ->get();
                        
        return view('appointments',compact('appointments') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {        
        $data = Appointment::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'service_id' => $request->service_id,
            'notes' => $request->notes,
        ]);

        return response()->json(compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment, Request $request)
    {
        $data = Appointment::findOrFail($request->id);
        $data->service = $data->service;
        $data->patient = $data->patient;

        return response()->json(compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $appointment = Appointment::findOrFail($request->id);

        return view('appointment.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function accept(Request $request)
    {
        $appointment = Appointment::findOrFail($request->id);

        $appointment->accepted_at = $appointment->accepted_at ?? now();

        $appointment->save();

        $data = $appointment;

        return response()->json(compact('data'));

    }

    public function cancel(Request $request)
    {
        $appointment = Appointment::findOrFail($request->id);
        $appointment->cancelled_at =  $appointment->cancelled_at ?? now();

        $appointment->save();

        $data = $appointment;

        return response()->json(compact('data'));

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
