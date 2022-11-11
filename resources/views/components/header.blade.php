<header class="ui secondary fitted menu">
    <div class="fitted item landscape:hidden">
        <img src="https://img.icons8.com/ios-filled/50/null/menu-rounded.png" class="w-8 mr-8"/>
    </div>

    <div class="fitted item portrait:hidden">
        <div class="font-bold text-4xl portrait:text-3xl">@yield('title')</div>
    </div>

    <div class="right menu">
        <div class="fitted item text-black">
            <i class="big user circle outline icon outline-none cursor-pointer" onclick="$('#user-sidebar').sidebar('toggle')"></i>   
        </div>
    </div>
</header>

<div class="font-semibold text-4xl portrait:text-4xl landscape:hidden mb-5">@yield('title')</div>
