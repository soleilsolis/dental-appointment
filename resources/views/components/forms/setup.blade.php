<form class="ui form submit-form" 
    data-method="POST" 
    data-action="/user/setup" 
    data-callback="reload"
>
    @csrf

    <x-field id="first_name" name="first_name" type="text" label="First Name" ></x-field>
    <x-field id="last_name" name="last_name" type="text" label="Last Name" ></x-field>

    <button class="ui circular fluid big bluerounded button mt-12" type="submit">Register</button>
</form>