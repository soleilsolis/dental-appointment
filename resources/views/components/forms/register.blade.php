<form class="ui large form submit-form" 
    data-method="POST" 
    data-action="/register" 
    data-api="no"
    data-callback="reload"
>
    @csrf

    <x-field id="name" name="name" type="text" label="Username" ></x-field>
    <x-field id="email" name="email" type="email" label="Email" ></x-field>
    <x-field id="password" name="password" type="password" label="Password" ></x-field>
    <x-field id="password.confirmation" name="password.confirmation" type="password" label="Confirm Password" ></x-field>

    <button class="ui circular fluid big blue button mt-12" type="submit">Register</button>
</form>
