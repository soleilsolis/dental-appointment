<form class="ui large form submit-form"
    data-method="POST"
    data-action="/forgot-password"
    data-api="no"
    data-callback="forgotModal"
>
    @csrf
    <x-field id="email" name="email" type="text" label="Email" ></x-field>
    <x-button class="blue" type="submit">Send Email</x-button>
</form>
