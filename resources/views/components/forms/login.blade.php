<form class="ui large form submit-form"
    data-method="POST"
    data-action="/login"
    data-api="no"
    data-callback="reload"
    >
    @csrf
    <div class="field">
        <label for="" class="text-[#7F8FA4]">Username or Email</label>
        <input type="text" name="email" id="email"  autocomplete="off" >
        <span id="error_email" class="text-red-600 text-sm"></span>
    </div>

    <div class="field">
        <label for="" class="text-[#7F8FA4]">Password</label>
        <input type="password" name="password" id="password"  autocomplete="off" >
        <span id="error_password" class="text-red-600 text-sm"></span>
    </div>
    

    <button class="ui fluid circular big blue button mt-12" type="submit">Log In</button>
    
    
    <div class="mt-10 mb-6 text-gray-500 text-center font-medium  leading-loose">
        Don't have and account? <x-link href="/register" class="text-lg">Register</x-link>
        <br>
        <x-link href="/reset-password" class="text-lg">Forgot Password?</x-link>

    </div>
</form>
