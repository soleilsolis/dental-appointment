<header class="ui secondary fitted menu">
    <div class="fitted item landscape:hidden">
        <img onclick="$('#side-bar').sidebar('toggle')" src="https://img.icons8.com/ios-filled/50/null/menu-rounded.png" class="w-8 mr-8"/>
    </div>

    <div class="fitted item portrait:hidden">
        <div class="font-bold text-4xl portrait:text-2xl">@yield('title')</div>
    </div>

    <div class="right menu">

        @if (\Illuminate\Support\Facades\Auth::user()->type === 'patient')
            <div class="item text-black cursor-pointer" data-tooltip="New Appointment" data-position="bottom center" >
                <i  onclick="$('#new-appointment').modal('show')" class="large plus icon" ></i>
            </div>
        @endif
        <div class="item text-black">
            <i class="large bell icon"></i>
        </div>
        <div class="fitted item text-black">
            <img onclick="$('#user-sidebar').sidebar('toggle')" class="ui avatar image w-10 h-10" src="https://i.picsum.photos/id/237/200/300.jpg?hmac=TmmQSbShHz9CdQm0NkEjx1Dyh_Y984R9LpNrpvH2D_U">
        </div>
    </div>
</header>

