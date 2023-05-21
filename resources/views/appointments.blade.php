@extends('layouts.app')

@section('title', 'Appointments')


@section('main')

@if (\Illuminate\Support\Facades\Auth::user()->type === 'dentist')

<x-button class="blue w-auto" onclick="location.href = '/appointments/print' "><i class="file icon"></i> Export to PDF</x-button>

@endif
   <form class="submit-form" data-action="/appointments/mass-delete" data-method="POST" data-callback="reload">
    @csrf
<x-button class="red w-auto mt-5" type="submit"><i class="delete icon"></i> Cancel</x-button>

    <table class="ui large padded celled selectable stackable table max-w-[1400px] border-0 shadow-md">
        <thead>
            @if (\Illuminate\Support\Facades\Auth::user()->type === 'dentist')
                <th>
                    <input type="checkbox" class="w-5 h-5 mx-auto" id="mass-cancel">

                </th>
            @endif
            <th></th>
            <th>Name</th>
            <th>Service</th>
            <th>Appointment Date</th>
            <th class="right aligned">Dentist</th>
            <th class="collapsing right aligned">Status</th>
        </thead>

        <tbody>
            @foreach ($appointments as $appointment)
                <tr >
                    @if (\Illuminate\Support\Facades\Auth::user()->type === 'dentist')
                        <td>
                            <input type="checkbox" class="mass-cancel w-5 h-5 mx-auto" id="mass_{{ $appointment->id }}" name="mass_{{ $appointment->id }}">
                        </td>
                    @endif
                    <td onclick="location.href = '/appointment/{{ $appointment->id }}'">{{ $appointment->id }}</td>
                    <td onclick="location.href = '/appointment/{{ $appointment->id }}'">{{ $appointment->patient->last_name }}, {{ $appointment->patient->first_name }}</td>
                    <td onclick="location.href = '/appointment/{{ $appointment->id }}'">{{ $appointment->service->name }}</td>

                    <td onclick="location.href = '/appointment/{{ $appointment->id }}'">
                        @if ($appointment->date)
                            {{ $appointment->date ?? '' }}
                            : {{ $appointment->start_time ?? ''}}
                            - {{ $appointment->end_time ?? '' }}
                        @endif
                    </td>
                    <td onclick="location.href = '/appointment/{{ $appointment->id }}'" class="right aligned">
                        {{ $appointment->dentist ? "{$appointment->dentist->last_name}, {$appointment->dentist->first_name}" : 'TBA' }}
                    </td>
                    <td onclick="location.href = '/appointment/{{ $appointment->id }}'" class="collapsing right aligned">
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
   </form>

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

        const massCancel = [...document.querySelectorAll('.mass-cancel')];
        const massCancelButton = document.getElementById('mass-cancel-button');

        document.querySelector('#mass-cancel').onchange = (event) => {
            massCancel.forEach(element => element.checked = event.target.checked);
          //  event.target.checked ? massCancelButton.classList.remove('hidden') : massCancelButton.classList.add('hidden')
        };

  
    </script>
@endsection
