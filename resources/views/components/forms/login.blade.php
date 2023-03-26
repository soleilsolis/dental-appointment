<form class="ui form submit-form"
    data-method="POST"
    data-action="/login"
    data-api="no"
    data-callback="reload"
    >
    @csrf
    <x-field id="email" name="email" type="text" label="Email" ></x-field>
    <x-field id="password" name="password" type="password" label="Password" ></x-field>

    <x-button class="blue" type="submit">Log In</x-button>
</form>
