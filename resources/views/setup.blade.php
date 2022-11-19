@extends('layouts.setup')

@section('title', 'Setup')
@section('subtitle', 'Please fill out the form below to complete your account information!')
    
@section('main')

    <div class="bg-white shadow-md p-6 rounded-md">
        <x-forms.setup />
    </div>
    

@endsection
