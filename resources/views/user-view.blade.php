@php
    use Carbon\Carbon;
@endphp

@extends('layouts.app')

@section('title', "{$user->last_name}, {$user->first_name} ({$user->name}) - Edit User")


@section('main')
    <div class="grid lg:grid-cols-9 md:grid-cols-6 grid-cols-1 gap-10 max-w-6xl">
        <div class="lg:col-span-6 md:col-span-4 col-span-1 ">
            <x-segment>
                <img class="ui rounded-full image aspect-square shadow-md w-[300px] mb-10" src="https://picsum.photos/500" alt="">

                <form action="" class="ui large form submit-form" data-action="/user/update" data-method="POST" data-callback="reload">
                    @csrf
                    <x-field id="id" name="id" type="hidden" value="{{ $user->id }}"></x-field>
                    <x-field id="name" name="name" type="text" label="User Name" value="{{ $user->name }}"></x-field>
                    <x-field id="email" name="email" type="text" label="Email Address" value="{{ $user->email }}"></x-field>
                    <x-field id="password" name="password" type="password" label="Password"></x-field>

                    <div class="equal width fields">
                        <x-field id="first_name" name="first_name" label="First Name" type="text" value="{{ $user->first_name }}"></x-field>
                        <x-field id="last_name" name="last_name" label="Last Name" type="text" value="{{ $user->last_name }}"></x-field>
                    </div>
                    <x-field id="type" name="type" label="Type" type="dropdown" value="{{ $user->type }}">
                        <option value="dentist">Dentist</option>
                        <option value="patient">Patient</option>
                    </x-field>
                    <x-field id="birthdate" name="birthdate" label="Birthdate" type="date" value="{{ Carbon::parse($user->birthdate)->format('Y-m-d') }}"></x-field>
    
                    <button class="ui blue large rounded-full button font-semibold" type="submit">Save</button>
                </form> 
            </x-segment>
            <a class="text-green-500 ml-5 cursor-pointer hover:underline transition-ease" onclick="newAppointmentAdmin()">Create Appointment</a>

            <a class="text-red-500 ml-5 cursor-pointer hover:underline transition-ease">Delete Account</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        function newAppointmentAdmin(){
            $('#new_id').val({{ $user->id }});
            $('#new-appointment').modal('show');
        }
    </script>
@endsection