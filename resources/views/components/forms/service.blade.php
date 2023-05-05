<form id="service-form" class="ui large form submit-form" 
    data-method="POST" 
    data-action="" 
    data-callback="reload"
>
    @csrf
    <x-field id="service-id" name="id" type="hidden" ></x-field>

    <x-field id="name" name="name" type="text" label="Name" ></x-field>
    <x-field id="price" name="price" type="number" label="Price" ></x-field>

    <button class="ui circular large blue button mt-12 float-right font-semibold" type="submit">Save</button>

</form>