<form class="ui large form submit-form"
    data-method="POST"
    data-action="/forgot-password"
    data-api="no"
    data-callback="forgotModal"
>
    @csrf
    <x-field id="email" name="email" type="text" label="Email" ></x-field>
  
    <button class="ui fluid circular big blue button mt-12" type="submit">Log In</button>
    
</form>
