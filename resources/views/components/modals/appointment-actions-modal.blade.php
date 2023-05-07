<div id="appointment-actions-modal" class="ui basic modal">

    <div class="content">
        <x-segment class="overflow-auto">
            <h2 class="mb-10 text-black text-3xl font-bold">Proceed with action</h2>

            <form id="set-status" class="ui form actions submit-form" data-action="" data-method="POST" data-callback="reload">
                @csrf
                <x-field data-fieldclass="date-fields" id="date" name="date" type="date" label="Date" required="1"></x-field>
        
                <div class="equal width fields">
                    <x-field data-fieldclass="date-fields" id="start_time" name="start_time" type="time" label="From" required="1"></x-field>
                    <x-field data-fieldclass="date-fields" id="end_time" name="end_time" type="time" label="To" required="1"></x-field>
                </div>
                <x-button class="red large w-auto float-left ml-0" type="submit">Yes</x-button>
                <x-button class="secondary inverted large w-auto float-left ml-0" onclick="$('#appointment-actions-modal').modal('hide')">Close</x-button>
            </form>
        </x-segment>
    </div>
</div>
