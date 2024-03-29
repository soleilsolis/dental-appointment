<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\ToothChart;
use App\Models\ToothType;

use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Http\Requests\UploadPhotoRequest;
use App\Http\Requests\Prescription as PrescriptionValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\Schedule;
use App\Mail\Prescription;
use App\Mail\Canceled;
use App\Mail\Reschedule;
use Faker\Generator as Faker;
use PDF;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function massDelete(Request $request)
    {
        foreach($request->all() as $key => $value){
            $appointment = Appointment::find((int) ltrim($key, 'mass_'));
            
            if($value == 'on'){
                $appointment->cancelled_at = now();
                $appointment->save();
            }
        }

        $data = [];
        return response()->json(compact('data'));
    }

    public function index(Request $request)
    {
        $appointments = Auth::user()->type !== 'patient' 
                    ? Appointment::all()->sortDesc()
                    : Appointment::where('user_id', '=', Auth::id())
                        ->get()->sortDesc();
                        
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
            'user_id' => $request->new_id ?? Auth::id(),
            'service_id' => $request->service_id,
            'notes' => $request->notes,
            'prescription' => ""
            
        ]);

        foreach (ToothType::all() as $toothType) {
            $current = ToothChart::create([
                'appointment_id' =>  $data->id,
                'tooth_type_id' => $toothType->id,
            ]);

            $previous = ToothChart::whereRelation('appointment', 'user_id', $current->appointment->user_id)
            ->where([
                'tooth_type_id' => $toothType->id,
            ])
            ->first();

            if($previous){
                $current->condition_id = $previous->condition_id;
                $current->modifications = $previous->modifications;
                $current->save();
            }
        }
        
    //    return response()->json(compact('data'));
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
        $data->date = $appointment->date ? Carbon::parse($appointment->date)->format('F d, Y') : "";
        $data->start_time = $appointment->start_time ? Carbon::parse($appointment->start_time)->format('g:i A'): "";
        $data->end_time = $appointment->end_time ? Carbon::parse($appointment->end_time)->format('g:i A'): "";

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

        $appointment->dentist_user_id = Auth::id();
        $appointment->accepted_at = $appointment->accepted_at ?? now();
        $appointment->cancelled_at = NULL;
        $appointment->date = $request->date;
        $appointment->start_time = $request->start_time;
        $appointment->end_time = $request->end_time;
        $appointment->save();

        $data = $appointment;

        Mail::to($appointment->patient)->send(new Schedule($appointment));

        return response()->json(compact('data'));
    }

    public function cancel(Request $request)
    {
        $appointment = Appointment::findOrFail($request->id);
        $appointment->cancelled_at =  $appointment->cancelled_at ?? now();

        $appointment->save();

        $data = $appointment;

        Mail::to($appointment->patient)->send(new Canceled($appointment));

        return response()->json(compact('data'));
    }

    public function complete(Request $request)
    {
        $appointment = Appointment::findOrFail($request->id);
        $appointment->completed_at =  $appointment->completed_at ?? now();

        $appointment->save();

        $data = $appointment;

        Mail::to($appointment->patient)->send(new Prescription($appointment));

        return response()->json(compact('data'));
    }

    public function addPhoto(UploadPhotoRequest $request, Faker $faker) {
        $appointment = Appointment::findOrFail($request->id);
        
        $path = json_decode($appointment->pictures, true);

        foreach ($request->file('pictures') as $picture) {
            $extension = $picture->extension();
            $filename = "{$faker->uuid()}.{$extension}";
            $picture->move(storage_path() . '/app/public/pictures', $filename);

            $path[] = env('APP_URL') . '/storage/pictures/' . $filename;
        }
        
        $appointment->pictures = json_encode($path, true);
        $appointment->save();

        return response()->json(compact('data'));
    }

    public function prescription(PrescriptionValidation $request, Faker $faker)
    {
        $appointment = Appointment::findOrFail($request->id);

        $file = $request->file('prescription');
        $extension = $file->extension();

        $filename = "{$faker->uuid()}.{$extension}";

        $path = storage_path() . '/app/public/documents';

        $file->move($path , $filename);

        $appointment->prescription =  '/storage/documents/'.$filename;

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
