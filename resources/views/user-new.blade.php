@php

    use Carbon\Carbon;
@endphp

@extends('layouts.app')

@section('title', "New User")


@section('main')
    <div class="grid lg:grid-cols-9 md:grid-cols-6 grid-cols-1 gap-10 max-w-6xl">
        <div class="lg:col-span-6 md:col-span-4 col-span-1 ">
            <x-segment>

                <form action="" class="ui large form submit-form" data-action="/user/new" data-method="POST" data-callback="newUser">
                    @csrf
                    <x-field id="name" name="name" type="text" label="User Name" value=""></x-field>
                    <x-field id="email" name="email" type="text" label="Email Address" value=""></x-field>
                    <x-field id="password" name="password" type="password" label="Password"></x-field>

                    <div class="equal width fields">
                        <x-field id="first_name" name="first_name" label="First Name" type="text" value=""></x-field>
                        <x-field id="last_name" name="last_name" label="Last Name" type="text" value=""></x-field>
                    </div>
                    <x-field id="type" name="type" label="Type" type="dropdown" value="">
                        <option value="dentist">Dentist</option>
                        <option value="patient">Patient</option>
                    </x-field>
                    <x-field id="birthdate" name="birthdate" label="Birthdate" type="date" value=""></x-field>
    
                    <button class="ui blue large rounded-full button font-semibold" type="submit">Save</button>
                </form> 
            </x-segment>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function newUser(response){
            location.href = '/user/'+response.data.id;
        }
    </script>
@endsection