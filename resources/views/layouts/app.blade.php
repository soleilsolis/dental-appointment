<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - RM Dental Studio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ Vite::asset('resources/image/logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css" integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <style>
        *:not(i) {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
</head>
<body class="bg-[#F6F6F6]">
    <x-side-bar></x-side-bar>

    <main class="pusher h-full p-6 pt-7 ml-80 pl-8 portrait:p-6 portrait:pt-5 portrait:ml-0">
        <x-header></x-header>

        <div class="mt-12 pb-20 portrait:mt-0">@yield('main')</div>
    </main>

    <x-user-side-bar></x-user-side-bar>

    <div id="new-appointment" class="ui basic small modal">
        <div class="bg-white shadow-md p-6 rounded-md overflow-auto">
            <h1 class="mb-10 text-black text-3xl font-bold">New Appointment</h1>
            <x-forms.appointment />
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js" integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js" integrity="sha256-+8RZJua0aEWg+QVVKg4LEzEEm/8RFez5Tb4JBNiV5xA=" crossorigin="anonymous"></script>
    @vite('resources/js/app.js')
    
    @yield('scripts')

    <script>
        $('.dropdown').dropdown();

        function reload() {
            location.reload();
        }

        function appointments() {
            location.href = '/appointments';
        }
    </script>
</body>
</html>
