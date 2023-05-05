<div id="appointment-modal" class="ui small modal">
    <div class="header">
        <span id="appointment-header" ></span>

    </div>
    <div class="content">
        <div class="grid grid-cols-3 portrait:grid-cols-1 gap-4">


            <div class="col-span-3">
                <div>
                    <div class="font-medium text-xl">Patient: </div>
                    <span id="appointment-patient" class="font-semibold text-2xl"></span>
                </div>
                <div class="my-4">
                    <div class="font-medium text-xl">Age: </div>
                    <span id="appointment-age" class="font-semibold text-2xl">45 years old</span>
                </div>
                <div class="my-4">
                    <div class="font-medium text-xl">Service: </div>
                    <span id="appointment-service" class="font-semibold text-2xl">Tooth Extraction </span>
                </div>
                <div>
                    <div class="font-medium text-xl">Schedule: </div>
                    <span id="appointment-schedule" class="font-semibold text-2xl"></span>
                </div>
                <div class="my-4">
                    <div class="font-medium text-xl">Notes: </div>
                    <span id="appointment-notes" class="text-lg">Need extraction for a week now, but too shy to ask for
                        help. </span>
                </div>
                <div>
                    <div class="font-medium text-xl">Prescription: </div>
                    <span id="appointment-prescription" class="font-semibold text-2xl"></span>
                </div>

                <div>
                    <div class="font-medium text-xl">Pictures: </div>
                    <span id="appointment-pictures" class="font-semibold text-2xl ui images"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <button class="ui button" onclick="$('#appointment-modal').modal('hide')">Close</button>
       
        @if (\Illuminate\Support\Facades\Auth::user()->type === 'dentist')
            <button id="accept" class="ui green button appointment-set-status hidden" data-action="" data-status="accept">Accept</button>
            <button id="cancel" class="ui red button appointment-set-status hidden" data-action="" data-status="cancel">Cancel</button>
            <button id="reschedule" class="ui blue button appointment-set-status hidden" data-action="" data-status="reschedule">Reschedule</button>

        @endif
        <button id="photo-button" class="ui teal button" data-action="" data-status="photo-button">Upload Photos</button>

    </div>
</div>
