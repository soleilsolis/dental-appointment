@extends('layouts.guest')

@section('main')
    <x-side-form title="Log In">
        <x-forms.login />

        <div class="text-right mt-6 mb-12">
            <x-link href="/reset-password" class="text-xl">Forgot Password?</x-link>
        </div>
        
        <button class="ui fluid huge blue button">Log In</button>
        
        <div class="ui divider  mt-12 mb-6"></div>
        
        <div class="text-center ">
            <x-link href="/register" class="text-xl">Sign Up</x-link>
        </div>
    </x-side-form>
@endsection
 