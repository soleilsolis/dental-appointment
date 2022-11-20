@extends('layouts.guest')

@section('title', 'Forgot Password')

@section('main')
    <x-side-form title="Forgot Password" subtitle="Please enter your registered email address. We will send you an email with the recovery link.">
        <x-forms.forgot-password />
    
        <div class="mt-10 mb-6 text-gray-500 text-center font-medium leading-loose text-lg">
            <x-link href="/login" >Log In</x-link> instead
        </div>
    </x-side-form>

    <div id="forgot-modal" class="ui basic small modal">
        <div class="bg-white shadow-md p-6 rounded-md overflow-auto">
            <h1 class="mb-10 text-black text-3xl font-bold">Reset password link emailed!</h1>
            We have emailed your password reset link!
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function forgotModal() {
            $('#forgot-modal').modal({closable: false}).modal('show');
        }
    </script>
@endsection
 