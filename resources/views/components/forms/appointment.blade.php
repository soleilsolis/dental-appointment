<form class="ui large form submit-form"
    data-method="POST"
    data-action="/appointments"
    data-callback="appointments"
    >
    @csrf

    <x-field id="service_id" name="service_id" type="dropdown" label="Service" >
        @foreach (\App\Models\Service::all() as $service)
            <option value="{{ $service->id }}">{{ $service->name }} - ₱{{ $service->price }}</option>
        @endforeach
    </x-field>

    <x-field id="date" name="date" type="date" label="Date" required="1"></x-field>
    
    <div class="equal width fields">
        <x-field id="start_time" name="start_time" type="time" label="From" required="1"></x-field>
        <x-field id="end_time" name="end_time" type="time" label="To" required="1"></x-field>
    </div>

    <x-field id="notes" name="notes" label="Notes" type="textarea" placeholder="Describe Your Situation..."></x-field>

    <button class="ui circular big blue button mt-12 float-right" type="submit">Save</button>
    <span class="ui circular big secondary button mt-12 float-right" onclick="$('#new-appointment').modal('hide')">Close</span>

</form>
