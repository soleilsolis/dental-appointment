<form id="register-form" class="ui big form" action="/register" method="POST">
    @csrf
    <div class="field">
        <label for="name" class="text-[#7F8FA4]">Username</label>
        <input type="text" name="name" id="name">
        <span class=""></span>
    </div>

    <div class="field">
        <label for="" class="text-[#7F8FA4]">Email</label>
        <input type="email" name="email" id="email">
        <span class=""></span>
    </div>

    <div class="field">
        <label for="password" class="text-[#7F8FA4]">Password</label>
        <input type="password" name="password" id="password">
        <span class=""></span>
    </div>

    <div class="field">
        <label for="password.confirmation" class="text-[#7F8FA4]">Confirm Password</label>
        <input type="password" name="password.confirmation" id="password.confirmation">
        <span class=""></span>
    </div>
</form>
