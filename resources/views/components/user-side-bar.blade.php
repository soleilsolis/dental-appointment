@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
@endphp
<div id="user-sidebar" class="ui big right borderless vertical sidebar menu">
    <div class="item">
        <img class="ui avatar image" src="https://i.picsum.photos/id/237/200/300.jpg?hmac=TmmQSbShHz9CdQm0NkEjx1Dyh_Y984R9LpNrpvH2D_U">
        <span class="font-semibold">{{ $user->first_name }} {{ $user->last_name }}</span>
    </div>
    <a href="/settings" class="item">
        <span class="font-semibold">
            <i class="cog icon"></i>
        Settings
        </span>
    </a>
    <div href="" class="item">
        <form action="/logout" method="POST">
            @csrf
            <button class="ui redrounded button" type="submit">
                <i class="power off icon"></i>
     
                Log Out
            </button>
        </form>
    </div>

</div>