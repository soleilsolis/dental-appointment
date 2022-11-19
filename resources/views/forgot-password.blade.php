@extends('layouts.guest')

@section('title', 'Forgot Password')

@section('main')
    <x-side-form title="Forgot Password" subtitle="Please enter your registered email address. We will send you an email with the recovery link.">
        <x-forms.forgot-password />
    
        <div class="mt-10 mb-6 text-gray-500 text-center font-medium leading-loose text-lg">
            <x-link href="/login" >Log In</x-link> instead
        </div>
    </x-side-form>
@endsection
 