<form class="ui large form submit-form" 
    data-method="POST" 
    data-action="/user/setup" 
    data-callback="reload"
>
    @csrf

    <x-field id="first_name" name="first_name" label="First Name" type="text" value=""></x-field>
                        <x-field id="last_name" name="last_name" label="Last Name" type="text" value=""></x-field>

    <button class="ui circular fluid big blue button mt-12" type="submit">Register</button>
</form>