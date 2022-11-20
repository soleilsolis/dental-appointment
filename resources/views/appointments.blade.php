@extends('layouts.app')

@section('title', 'Appointments')


@section('main')
    <table class="ui large celled selectable stackable table max-w-[1400px]">
        <thead>
            <th></th>
            <th>Name</th>
            <th>Service</th>
            <th>Appointment Date</th>
            <th class="right aligned">Dentist</th>

            <th class="collapsing right aligned">Status</th>
        </thead>
        <tbody>

            @foreach ($appointments as $appointment)
                <tr onclick="getAppointment({{ $appointment->id }})">
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->patient->last_name }}, {{ $appointment->patient->first_name }}</td>
                    <td>{{ $appointment->service->name }}</td>

                    <td>{{ \Carbon\Carbon::parse($appointment->date)->format('F d, Y') }}
                        : {{ \Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }}
                        - {{ \Carbon\Carbon::parse($appointment->end_time)->format('g:i A') }}
                    </td>
                    <td class="right aligned">
                        {{ $appointment->dentist ? "{$appointment->dentist->last_name}, {$appointment->dentist->first_name}" : 'TBA' }}
                    </td>
                    <td class="collapsing right aligned">
                        @if ($appointment->accepted_at && !$appointment->cancelled_at)
                            <span class="ui green label">Accepted</span>
                        @elseif($appointment->cancelled_at)
                            <span class="ui red label">Cancelled</span>
                        @else
                            <span class="ui yellow label">Pending</span>
                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <form id="get-appointment-form" class="submit-form hidden" data-action="/appointment" data-method="POST"
        data-callback="printAppointment">
        @csrf
        <button type="submit"></button>
    </form>

    <div id="appointment-modal" class="ui small modal">
        <div id="appointment-id" class="header"></div>
        <div class="content">
            <div class="grid grid-cols-3 portrait:grid-cols-1 gap-4">
                <div>
                    <img src="https://i.picsum.photos/id/237/200/300.jpg?hmac=TmmQSbShHz9CdQm0NkEjx1Dyh_Y984R9LpNrpvH2D_U"
                        alt="" class="ui large image">
                </div>
                <div class="col-span-2">
                    <div>
                        <div class="font-medium text-xl">Patient: </div>
                        <span id="appointment-patient" class="font-semibold text-3xl"></span>
                    </div>
                    <div class="my-4">
                        <div class="font-medium text-xl">Age: </div>
                        <span id="appointment-age" class="font-semibold text-3xl">45 years old</span>
                    </div>
                    <div class="my-4">
                        <div class="font-medium text-xl">Service: </div>
                        <span id="appointment-service" class="font-semibold text-3xl">Tooth Extraction </span>
                    </div>
                    <div class="my-4">
                        <div class="font-medium text-xl">Notes: </div>
                        <span id="appointment-notes" class="text-lg">Need extraction for a week now, but too shy to ask for
                            help. </span>
                    </div>
                </div>

            </div>
        </div>
        <div class="actions">
            <button class="ui large button" onclick="$('#appointment-modal').modal('hide')">Close</button>
            @if (\Illuminate\Support\Facades\Auth::user()->type === 'dentist')
                <button id="cancel" class="ui large red button appointment-set-status" data-action=""
                    data-status="cancel">Cancel</button>
                <button id="accept" class="ui large green button appointment-set-status" data-action=""
                    data-status="accept">Accept</button>
            @endif
        </div>
    </div>

    <div id="appointment-actions" class="ui tiny modal">
        <div class="header">
            <span id="appointment-action"></span>
            Appointment
        </div>
        <div class="content">
            Are you sure?
        </div>
        <form id="set-status" class="actions submit-form" data-action="" data-method="POST" data-callback="reload">
            @csrf
            <button class="ui large red button" type="submit">Yes</button>

        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function getAppointment(id) {
            const form = document.querySelector('#get-appointment-form');
            form.dataset.action = `/appointment/get/${id}`;
            form.querySelectorAll('button')[0].click();
        }

        function printAppointment(result) {
            const appointment = result.data;

            document.querySelector('#appointment-id').innerHTML = appointment.id;

            document.querySelector('#appointment-patient').innerHTML =
            `${appointment.patient.last_name}, ${appointment.patient.first_name}`;
            document.querySelector('#appointment-service').innerHTML = appointment.service.name;
            document.querySelector('#appointment-notes').innerHTML = appointment.notes;

            document.querySelector('#cancel').dataset.action = "/appointment/cancel/" + appointment.id;
            document.querySelector('#accept').dataset.action = "/appointment/accept/" + appointment.id;

            $('#appointment-modal').modal('show');

        }
        
        [...document.querySelectorAll('.appointment-set-status')].forEach(element => {

            
            element.addEventListener('click', event => {


                if (element.dataset.status === 'cancel') {
                    document.querySelector('#appointment-action').innerHTML = 'Cancel';
                } else {
                    document.querySelector('#appointment-action').innerHTML = 'Accept';
                }

                document.querySelector('#set-status').dataset.action = element.dataset.action;

                $('#appointment-actions').modal('show');

            });

        });
    </script>
@endsection
