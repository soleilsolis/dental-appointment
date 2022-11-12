@extends('layouts.guest')

@section('main')
    <x-side-form title="Sign Up">
        <x-forms.register />

        <div class="my-12">
            <button class="ui fluid huge blue button" onclick="document.querySelector('#register-form').submit()">Sign Up</button>
        </div>
        
    
        
        <div class="text-center my-6">
            <x-link href="/login" class="text-xl">Log In</x-link>
        </div>
    </x-side-form>
@endsection
 