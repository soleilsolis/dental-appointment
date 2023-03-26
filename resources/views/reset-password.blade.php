@extends('layouts.guest')

@section('title', 'Reset Password')

@section('main')
    <x-side-form title="Reset Password" subtitle="Reset your RM Dental password.">
        <x-forms.reset-password 
            token="{{ $token }}" 
            email="{{ $email }}"
            />

        <div class="mt-10 mb-6 text-gray-500 text-center font-medium leading-loose text-lg">
            Already signed up? <x-link href="/login" >Log In</x-link>
        </div>
    </x-side-form>
@endsection

@section('scripts')
    <script>
        function forgotModal() {
            $('#forgot-modal').modal({closable: false}).modal('show');
        }
    </script>
@endsection
