@extends('layouts.guest')

@section('title', 'Log In')

@section('main')
    <x-side-form title="Log In" subtitle="Welcome back!">
        <x-forms.login />
    
        <div class="mt-10 mb-6 text-gray-500 text-center font-medium  leading-loose text-lg">
            Don't have and account? <x-link href="/register">Register</x-link>
            <br>
            <x-link href="/forgot">Forgot Password?</x-link>
        </div>
    </x-side-form>
@endsection
 