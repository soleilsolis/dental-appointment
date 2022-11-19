<form id="register-form" 
    class="ui large form submit-form" 
    data-method="POST" 
    data-action="/register" 
    data-api="no"
    data-callback="reload"
    >
    @csrf
    <div class="field">
        <label for="name" class="text-[#7F8FA4]">Username</label>
        <input type="text" name="name" id="name"  autocomplete="off">
        <span id="error_name" class="text-red-600 text-sm"></span>
    </div>

    <div class="field">
        <label for="" class="text-[#7F8FA4]">Email</label>
        <input type="email" name="email" id="email"  autocomplete="off">
        <span id="error_email" class="text-red-600 text-sm"></span>
    </div>

    <div class="field">
        <label for="password" class="text-[#7F8FA4]">Password</label>
        <input type="password" name="password" id="password"  autocomplete="off">
        <span id="error_password" class="text-red-600 text-sm"></span>
    </div>

    <div class="field">
        <label for="password.confirmation" class="text-[#7F8FA4]">Confirm Password</label>
        <input type="password" name="password.confirmation" id="password.confirmation"  autocomplete="off">
        <span id="error_password.confirmation" class="text-red-600 text-sm"></span>
    </div>


        <button class="ui circular fluid big blue button mt-12" type="submit">Register</button>
    
    <div class="mt-10 mb-6 text-gray-500 text-center font-medium  leading-loose">
        Already signed up? <x-link href="/login" >Log In</x-link>
       

    </div>

</form>
