<div class="max-w-[500px] bg-[#F6F6F6] p-12 portrait:p-6 h-full ">
    <img src="{{ Vite::asset('resources/image/logo.png') }}" alt="logo" class="ui circular small image portrait:w-24 shadow-md">

    <h1 class="font-bold text-5xl my-12 portrait:text-4xl portrait:mt-10">{{ $title ?? '' }}</h1>

    {{ $slot }}
</div>
