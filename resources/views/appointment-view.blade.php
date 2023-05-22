@php
    use Carbon\Carbon;
@endphp

@extends('layouts.app')

@section('title', "#{$appointment->id} - {$appointment->patient->last_name}, {$appointment->patient->first_name}")


@section('main')
    <div class="ui secondary menu">
        <div class="item">
            @if ($appointment->accepted_at && !$appointment->cancelled_at && !$appointment->completed_at)
                <span class="text-3xl font-semibold text-green-500">Accepted</span>
            @elseif($appointment->cancelled_at)
                <span class="text-3xl font-semibold text-red-500">Cancelled</span>
            @elseif($appointment->completed_at)
                <span class="text-3xl font-semibold text-blue-500">Completed</span>
            @else
                <span class="ui yellow button">Pending</span>
            @endif
        </div>
        <div class="right menu">
            @if (!$appointment->completed_at && \Illuminate\Support\Facades\Auth::user()->type === 'dentist')


                <div class="ui dropdown">
                    <div class="text"><i class="wrench icon"></i> Options</div>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        @if (!$appointment->accepted_at && !$appointment->cancelled_at && !$appointment->completed_at)
                            <div class="item appointment-set-status"
                                data-action="/appointment/accept/{{ $appointment->id }}" data-status="accept">
                                <i class="check icon"></i>
                                Accept
                            </div>
                        @endif

                        @if ($appointment->cancelled_at && !$appointment->completed_at)
                            <div class="item appointment-set-status"
                                data-action="/appointment/accept/{{ $appointment->id }}" data-status="reschedule">
                                <i class="file icon"></i>
                                Reschedule
                            </div>
                        @endif

                        @if ($appointment->accepted_at && !$appointment->cancelled_at && !$appointment->completed_at)
                            <div class="item appointment-set-status"
                                data-action="/appointment/cancel/{{ $appointment->id }}" data-status="cancel">
                                <i class="delete icon"></i>
                                Cancel
                            </div>
                        @endif
                        @if ($appointment->accepted_at && !$appointment->cancelled_at && !$appointment->completed_at)
                            <div class="item appointment-set-status"
                                data-action="/appointment/complete/{{ $appointment->id }}" data-status="complete">
                                <i class="star icon"></i>
                                Complete
                            </div>
                        @endif

                    </div>
                </div>
            @endif
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
                        <span id="appointment-age"
                            class="font-semibold text-2xl">{{ Carbon::parse($appointment->patient->birthdate)->diffInYears(now()) }}
                            years old</span>
                    </div>
                    <div class="my-4">
                        <div class="font-medium text-xl">Service: </div>
                        <span id="appointment-service" class="font-semibold text-2xl">{{ $appointment->service->name }}
                        </span>
                    </div>

                    @if ($appointment->date)
                        <div>
                            <div class="font-medium text-xl">Schedule: </div>
                            <span id="appointment-schedule" class="font-semibold text-2xl">
                                {{ Carbon::parse($appointment->date)->format('M d, Y') }}
                                @ {{ Carbon::parse($appointment->start_time)->format('g:i A') }}
                                - {{ Carbon::parse($appointment->end_time)->format('g:i A') }}
                            </span>
                        </div>
                    @endif
                    <div class="my-4">
                        <div class="font-medium text-xl">Notes: </div>
                        <span id="appointment-notes" class="text-lg">{{ $appointment->notes }}</span>
                    </div>
                    @if ($appointment->accepted_at)
                        <div>
                            <div class="font-medium text-xl">Accepted At: </div>
                            <span id="appointment-prescription"
                                class="font-semibold text-2xl">{{ Carbon::parse($appointment->accepted_at)->format('M d, Y g:i A') }}</span>
                        </div>
                    @endif

                    @if ($appointment->cancelled_at)
                        <div>
                            <div class="font-medium text-xl">Canceled At: </div>
                            <span id="appointment-prescription"
                                class="font-semibold text-2xl">{{ Carbon::parse($appointment->cancelled_at)->format('M d, Y g:i A') }}</span>
                        </div>
                    @endif

                    @if ($appointment->completed_at)
                        <div>
                            <div class="font-medium text-xl">Completed At: </div>
                            <span id="appointment-prescription"
                                class="font-semibold text-2xl">{{ Carbon::parse($appointment->completed_at)->format('M d, Y g:i A') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </x-segment>

        @if ($appointment->accepted_at)
            <h2 class="ui header text-3xl font-semibold">Tooth Chart</h2>
            <x-segment>
                <form class="grid lg:grid-cols-6 grid-cols-1 submit-form" data-action="/toothChart/update/appointment/{{ $appointment->id }}"
                    data-method="POST" data-callback="reload">
                    @csrf
                    @foreach ($appointment->toothChart as $toothChart)
                        <div class="mb-5">
                            <h3 class="mb-2 font-semibold text-xl flex items-center" >

                                <span class="inline-flex"><img src="{{ $toothChart->toothType->image_path }}" alt="" class="h-36 mr-5"></span>
                                
                                {{ $toothChart->toothType->id }} -
                        
                            
                            </h3>
                            <div class="equal width fields">
                                <x-field id="condition_{{ $toothChart->id }}" name="condition_{{ $toothChart->id }}"
                                    type="dropdown" label="C" class="w-10">
                                    <option value=""></option>
                                    @foreach ($conditions as $condition)
                                        <option value="{{ $condition->id }}"
                                            @if ((int) $toothChart->condition_id === (int) $condition->id) selected @endif>
                                            {{ $condition->code }}
                                        </option>
                                    @endforeach
                                </x-field>
    
                                <x-field id="modification_{{ $toothChart->id }}" name="modification_{{ $toothChart->id }}[]"
                                    multiple type="dropdown" label="M">
    
                                    @php
                                        $x = json_decode($toothChart->modifications, true) ?? [];
                                    @endphp
                                    @foreach ($modifications as $modification)
                                        <option value="{{ $modification->id }}"
                                            @if (array_search($modification->id, $x) !== false) selected @endif>
    
                                            {{ $modification->code }}
                                        </option>
                                    @endforeach
                                </x-field>
                            </div>
                        </div>
                    @endforeach

                    @if (\Illuminate\Support\Facades\Auth::user()->type === 'dentist')
                        <div>
                            <x-button class="blue large w-auto mt-5">Save</x-button>
                        </div>
                    @endif
                </form>
            </x-segment>

            <h2 class="ui header text-3xl font-semibold">Prescription</h2>
            <x-segment>
                @if (\Illuminate\Support\Facades\Auth::user()->type === 'dentist')
                    <form data-action="/appointment/prescription/{{ $appointment->id }}" class="ui large form submit-form"
                        data-method="POST" data-callback='reload'>
                        <x-field id="prescription" name="prescription" type="file"></x-field>
                        <x-button class=" olive large w-auto" type="submit">Save</x-button>
                        @csrf
                    </form>
    
                    
                @endif

                @if ($appointment->prescription)

                    <div class="mt-5">
                        <a href="{{ $appointment->prescription }}" class="mt-5 text-blue-400">Download File</a>
                    </div>                    
                @endif
            </x-segment>

            <h2 class="ui header text-3xl font-semibold">Pictures</h2>
            <x-segment>
                <div class="ui images">
                    @foreach (json_decode($appointment->pictures, true) ?? [] as $picture)
                        <img class="ui rounded small image" src="{{ $picture }}" alt="">
                    @endforeach
                </div>
                @if (\Illuminate\Support\Facades\Auth::user()->type === 'dentist')
                    <x-button id="photo-button" class=" teal large w-auto" data-action="" data-status="photo-button"
                        onclick="$('#upload-photos').modal('show')">Upload Photos</x-button>
                @endif

            </x-segment>

        @endif


        @if (\Illuminate\Support\Facades\Auth::user()->type === 'dentist')
            <x-modals.appointment-actions-modal></x-modals.appointment-actions-modal>
            <x-modals.upload-photo></x-modals.upload-photo>
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

        });

        document.getElementById('upload-photo-form').dataset.action = "/appointment/addPhoto/" + {{ $appointment->id }};
    </script>
@endsection
