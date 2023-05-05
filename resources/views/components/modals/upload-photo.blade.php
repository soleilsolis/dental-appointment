<div id="upload-photos" class="ui tiny modal">
    <div class="header">
        <span id="appointment-action"></span>
        Upload Photos
    </div>
    <div class="content">
        <form id="upload-photo-form" class="ui form actions submit-form" data-action="" data-method="POST" data-callback="reload">
            @csrf
            <x-field id="pictures" name="pictures[]" type="file" label="Pictures" required="1" multiple></x-field>

            
            <div class="field">
                <button class="ui green button" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
