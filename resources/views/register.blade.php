@extends('layouts.guest')

@section('title', 'Register')

@section('main')
    <x-side-form title="Register" subtitle="Register to set appointments with us!">
        <x-forms.register />

        <div class="mt-10 mb-6 text-gray-500 text-center font-medium leading-loose text-lg">
            Already signed up? <x-link href="/login" >Log In</x-link>
        </div>
    </x-side-form>
@endsection
 