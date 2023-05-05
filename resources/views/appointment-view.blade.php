@php
    use Carbon\Carbon;    
@endphp

@extends('layouts.app')

@section('title', "#d")


@section('main')
   <div class="ui secondary menu">
        <button class="ui large blue button appointment-set-status" data-action="/appointment/accept/{{ $appointment->id }}" data-status="accept">
            Accept
        </button>
        <button class="ui large inverted secondary button appointment-set-status" data-action="/appointment/reschedule/{{ $appointment->id }}" data-status="reschedule">    
            Reschedule
        </button>
        <button class="ui large inverted red button appointment-set-status" data-action="/appointment/cancel/{{ $appointment->id }}" data-status="cancel">    
            Cancel
        </button>

        <button class="ui large inverted secondary button appointment-set-status" data-action="/appointment/complete/{{ $appointment->id }}" data-status="complete">    
            Complete
        </button>

        <div class="right menu">
            sdf
        </div>
   </div>

    <div class="mt-10">
        <x-segment>
            <div class="grid grid-cols-3 portrait:grid-cols-1 gap-4">
                <div class="col-span-3">
                    <div>
                        <div class="font-medium text-xl">Patient: </div>
                        <span id="appointment-patient" class="font-semibold text-2xl">
                            {{ $appointment->patient->last_name }}
                            {{ $appointment->patient->first_name }}, 
                        </span>
                    </div>
                    <div class="my-4">
                        <div class="font-medium text-xl">Age: </div>
                        <span id="appointment-age" class="font-semibold text-2xl">{{ Carbon::parse($appointment->patient->birthdate)->diffInYears(now())  }} years old</span>
                    </div>
                    <div class="my-4">
                        <div class="font-medium text-xl">Service: </div>
                        <span id="appointment-service" class="font-semibold text-2xl">{{ $appointment->service->name }} </span>
                    </div>
                    <div>
                        <div class="font-medium text-xl">Schedule: </div>
                        <span id="appointment-schedule" class="font-semibold text-2xl">
                            {{ $appointment->date }} @ {{ $appointment->start_time }} - {{ $appointment->end_time }} 
                        </span>
                    </div>
                    <div class="my-4">
                        <div class="font-medium text-xl">Notes: </div>
                        <span id="appointment-notes" class="text-lg">{{ $appointment->notes }}</span>
                    </div>
                    <div>
                        <div class="font-medium text-xl">Prescription: </div>
                        <span id="appointment-prescription" class="font-semibold text-2xl"></span>
                    </div>                
                </div>
            </div>
        </x-segment>

        @if ($appointment->accepted_at)
            <h2 class="ui header text-3xl font-semibold">Tooth Chart</h2>
            <x-segment></x-segment>

            <h2 class="ui header text-3xl font-semibold">Pictures</h2>
            <x-segment></x-segment>

        @endif
        
        <x-modals.upload-photo></x-modals.upload-photo>

        @if (\Illuminate\Support\Facades\Auth::user()->type === 'dentist')
            <x-modals.appointment-actions-modal></x-modals.appointment-actions-modal>
        @endif
    </div>  
@endsection

@section('scripts')
    <script>
                [...document.querySelectorAll('.appointment-set-status')].forEach(element => {
            element.addEventListener('click', event => {
                const appointmentAction = document.querySelector('#appointment-action');

                appointmentAction.innerHTML = element.dataset.status === 'cancel' ? 'Cancel' : 'Accept';
                document.querySelector('#set-status').dataset.action = element.dataset.action;


                [...document.querySelectorAll('.date-fields')].forEach(field => {
                    element.dataset.status == 'accept' || element.dataset.status == 'reschedule' ?
                        field.classList.remove('hidden') : field.classList.add('hidden');
                });

                $('#appointment-actions-modal').modal('show');
            });

            document.getElementById('upload-photo-form').dataset.action = "/appointment/addPhoto/" +
                    appointment.id;
        });
    </script>
@endsection