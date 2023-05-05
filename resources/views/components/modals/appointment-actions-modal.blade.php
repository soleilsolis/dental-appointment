<div id="appointment-actions-modal" class="ui tiny modal">
    <div class="header">
        <span id="appointment-action"></span>
        Appointment
    </div>
    <div class="content">
        <form id="set-status" class="ui form actions submit-form" data-action="" data-method="POST" data-callback="reload">
            @csrf
            <x-field data-fieldclass="date-fields" id="date" name="date" type="date" label="Date" required="1"></x-field>
    
            <div class="equal width fields">
                <x-field data-fieldclass="date-fields" id="start_time" name="start_time" type="time" label="From" required="1"></x-field>
                <x-field data-fieldclass="date-fields" id="end_time" name="end_time" type="time" label="To" required="1"></x-field>
            </div>
            
            <div class="field">
                <button class="ui red button" type="submit">Yes</button>
            </div>
        </form>
    </div>
</div>
