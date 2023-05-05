<form class="ui large form submit-form"
    data-method="POST"
    data-action="/reset-password"
    data-api="no"
    data-callback="forgotModal"
>
    @csrf
    <x-field id="token" name="token" type="hidden" value="{{ $attributes->get('token') }}"></x-field>

    <x-field id="email" name="email" type="email" label="Email" readonly="true" value="{{ $attributes->get('email') }}"></x-field>

    <x-field id="password" name="password" type="password" label="New Password" ></x-field>
    <x-field id="password.confirmation" name="password.confirmation" type="password" label="Confirm Password" ></x-field>
  
    <x-button class="blue mt-12">Reset Password</x-button>
</form>