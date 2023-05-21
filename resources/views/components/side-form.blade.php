<div class="max-w-[500px] bg-[#FAFAFA] p-12 portrait:p-6 h-full ">
    <div class="flex items-center">
        <a href="/login">
            <img src="{{ Vite::asset('resources/image/logo.png') }}" alt="logo" class="ui circular image w-16 shadow-md">
        </a>
        <span class="ml-5 text-2xl font-bold">RM Dental Studio</span>
    </div>

    <h1 class="font-semibold text-4xl mt-12 portrait:mt-10">{{ $title ?? '' }}</h1>
    <p class="text-gray-500 mb-12 mt-4 text-xl">{{ $subtitle ?? '' }}</p>

    <div class="pb-10">
        {{ $slot }}
    </div>
</div>
