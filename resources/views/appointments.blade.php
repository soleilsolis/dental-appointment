@extends('layouts.app')

@section('title', 'Appointments')


@section('main')

@if (\Illuminate\Support\Facades\Auth::user()->type === 'dentist')

<x-button class="blue w-auto" onclick="location.href = '/appointments/print' "><i class="file icon"></i> Export to PDF</x-button>

@endif
    <table class="ui large padded celled selectable stackable table max-w-[1400px] border-0 shadow-md">
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
                <tr onclick="location.href = '/appointment/{{ $appointment->id }}'">
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->patient->last_name }}, {{ $appointment->patient->first_name }}</td>
                    <td>{{ $appointment->service->name }}</td>

                    <td>
                        @if ($appointment->date)
                            {{ $appointment->date ?? '' }}
                            : {{ $appointment->start_time ?? ''}}
                            - {{ $appointment->end_time ?? '' }}
                        @endif
                    </td>
                    <td class="right aligned">
                        {{ $appointment->dentist ? "{$appointment->dentist->last_name}, {$appointment->dentist->first_name}" : 'TBA' }}
                    </td>
                    <td class="collapsing right aligned">
                        @if ($appointment->accepted_at && !$appointment->cancelled_at)
                            <span class="ui green label">Accepted</span>
                        @elseif($appointment->cancelled_at)
                            <span class="ui red label">Cancelled</span>
                        @elseif($appointment->completed_at)
                            <span class="ui label">Complete</span>
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

    <x-modals.upload-photo></x-modals.upload-photo>
    <x-modals.appointment></x-modals.appointment>

    @if (\Illuminate\Support\Facades\Auth::user()->type === 'dentist')
        <x-modals.appointment-actions-modal></x-modals.appointment-actions-modal>
    @endif
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

            document.getElementById('appointment-header').innerHTML = `${appointment.id} - ${appointment.patient.last_name}, ${appointment.patient.first_name}`;
            document.getElementById('appointment-patient').innerHTML =
                `${appointment.patient.last_name}, ${appointment.patient.first_name}`;
            document.getElementById('appointment-service').innerHTML = appointment.service.name;
            document.getElementById('appointment-notes').innerHTML = appointment.notes;
            document.getElementById('appointment-schedule').innerHTML =
                `${appointment.date} @ ${appointment.start_time} - ${appointment.end_time}`;

            @if (\Illuminate\Support\Facades\Auth::user()->type === 'dentist')
                const acceptButton = document.getElementById('accept');
                const cancelButton = document.getElementById('cancel');
                const rescheduleButton = document.getElementById('reschedule');

                acceptButton.classList.add("hidden");
                cancelButton.classList.add("hidden");
                rescheduleButton.classList.add("hidden");

                acceptButton.dataset.action = "/appointment/accept/" + appointment.id;
                cancelButton.dataset.action = "/appointment/cancel/" + appointment.id;

                if (!acceptButton.accepted_at && !appointment.cancelled_at) {
                    acceptButton.classList.remove("hidden");
                    cancelButton.classList.remove("hidden");
                }

                if (appointment.accepted_at && appointment.cancelled_at || appointment.cancelled_at) {
                    rescheduleButton.dataset.action = "/appointment/accept/" + appointment.id;
                    rescheduleButton.classList.remove("hidden");
                }

                if (appointment.completed_at) {
                    acceptButton.classList.add("hidden");
                    cancelButton.classList.add("hidden");
                    rescheduleButton.classList.add("hidden");
                }
            @endif

            const photo = document.getElementById('photo-button');

            photo.addEventListener('click', function() {
                document.getElementById('upload-photo-form').dataset.action = "/appointment/addPhoto/" +
                    appointment.id;
                $('#upload-photos').modal('show');
            });

            const pictureContainer = document.getElementById('appointment-pictures');

            while (pictureContainer.firstChild) {
                pictureContainer.removeChild(pictureContainer.firstChild);
                }

            if (appointment.pictures) {
                let pictures = JSON.parse(appointment.pictures);

                [...pictures].forEach(picture => {
                    const img = document.createElement('img');
                    img.classList.add("ui", "rounded", "small", "image");
                    img.setAttribute('src', picture);

                    pictureContainer.appendChild(img);
                });

            }


            $('#appointment-modal').modal('setting', 'closable', false).modal('show');


        }


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
    </script>
@endsection
