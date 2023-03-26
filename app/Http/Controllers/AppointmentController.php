<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Http\Requests\UploadPhotoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Faker\Generator as Faker;
use PDF;

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

        foreach($appointments as $appointment){
            $appointment->date = Carbon::parse($appointment->date)->format('F d, Y');
            $appointment->start_time = Carbon::parse($appointment->start_time)->format('g:i A');

            $appointment->end_time = Carbon::parse($appointment->end_time)->format('g:i A');
        }
                        
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
        $data->date = $appointment->date ? Carbon::parse($appointment->date)->format('F d, Y') : NULL;
        $data->start_time = $appointment->date ? Carbon::parse($appointment->start_time)->format('g:i A'): NULL;
        $data->end_time = $appointment->date ? Carbon::parse($appointment->end_time)->format('g:i A'): NULL;

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
    public function addPhoto(UploadPhotoRequest $request, Faker $faker) {
        $appointment = Appointment::findOrFail($request->id);
        
        $path = [];



        foreach ($request->file('pictures') as $picture) {
            $extension = $picture->extension();
            $filename = "{$faker->uuid()}.{$extension}";
            $picture->move(storage_path() . '/app/public/pictures', $filename);

            $path[] =env('APP_URL') . '/storage/pictures/' . $filename;
        }
        
        $appointment->pictures = json_encode($path, true);
        $appointment->save();

        return response()->json(compact('data'));

    }

    public function list(){
        $appointment = Appointment::all();
        return view('test', compact('appointment'));
      }

    public function print() {
        $data = Appointment::all();
        
        foreach ($data as $pp) {
            $pp->dentist  = $pp->dentist;
            $pp->patient = $pp->patient;
            $pp->service = $pp->service;
        }

        view()->share('appointment',$data->toArray());
        $pdf = PDF::loadView('test', $data->toArray());
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }

    public function accept(UpdateAppointmentRequest $request)
    {
        $appointment = Appointment::findOrFail($request->id);

        $conflictAppointment = Appointment::where([
            ['date', '=', $request->date],
            ['start_time', '<=', $request->start_time],
            ['end_time', '>=', $request->end_time],
            ['dentist_user_id', '=', Auth::id()]
        ])->first();

        if ($conflictAppointment) {
            return response()->json([
                'errors' => [
                    'date' => "A datetime conflict was found. Choose another date or time."
                ]
            ], 422);
        }

        $appointment->accepted_at = $appointment->accepted_at ?? now();
        $appointment->cancelled_at = NULL;
        $appointment->date = $request->date;
        $appointment->start_time = $request->start_time;
        $appointment->end_time = $request->end_time;
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
