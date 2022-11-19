<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - RM Dental Studio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css" integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <style>
        *:not(i) {
            font-family: 'Inter', sans-serif !important;
        }
    </style>
</head>
<body class="bg-slate-50 ">
    <main class="h-full max-w-[500px] mx-auto p-6">
        <div class="flex items-center justify-center">
            <a href="/login">
                <img src="{{ Vite::asset('resources/image/logo.png') }}" alt="logo" class="ui circular image w-16 shadow-md">
            </a>
            <span class="ml-5 text-2xl font-bold">RM Dental Studio</span>
        </div>

        <h1 class="text-center text-4xl font-bold mt-8">@yield('title')</h1>
        <p class="text-center text-gray-500 mb-12 mt-4 text-xl">@yield('subtitle')</p>


        @yield('main')

        <form action="/logout" method="POST" class=" text-center">
            @csrf
            <button class="ui circular large red button mt-5 " type="submit">
                
    
                Log Out
            </button>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js" integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/js/app.js')

    <script>
        function reload() {
            location.reload();
        }
    </script>
</body>
</html>
