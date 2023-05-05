@php
     use Illuminate\Support\Facades\Auth;
@endphp

<div id="side-bar" class="ui big @if(Auth::user()->type === 'dentist') inverted black @elseif(Auth::user()->type === 'patient') inverted blue @endif visible borderless vertical sidebar menu portrait:hidden">
    <div class="item flex items-center">
        <img src="{{ Vite::asset('resources/image/logo.png') }}" alt="logo" class="ui circular w-16 image inline">

        <span class="ml-6 text-4xl font-semibold">
            RM Dental
            <span class="text-lg font-normal">
                @if (Auth::user()->type != 'patient')
                    {{ ucfirst(Auth::user()->type) }}
                @endif
            </span>
        </span>
    </div>

    <a href="/home" class="item mt-2">
        <span class="font-semibold text-2xl">
            Home
        </span>
    </a>

    <a href="/appointments" class="item ">
        <span class="font-semibold text-2xl">
            Appointments
        </span>
    </a>

    @if (Auth::user()->type === 'dentist')
        <a href="/services" class="item ">
            <span class="font-semibold text-2xl">
                Services
            </span>
        </a>

        <a href="/users" class="item ">
            <span class="font-semibold text-2xl">
                Users
            </span>
        </a>
    @endif
</div>
