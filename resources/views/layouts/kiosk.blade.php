<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/sweetalert.js') }}"></script>
    <script defer src="{{ asset('asset/js/alpinejs@3.13.1.js') }}"></script>
</head>

<style>
    body {
        font-family: system-ui;
    }
</style>

<body class="bg-gray-200">
    <div class="flex flex-col h-screen">
        <!--  start::navbar   -->
        <nav class="flex bg-white h-16 items-center justify-start font-bold text-xl pl-10">
            <img src="{{ asset(DB::table('system_abouts')->value('about_image')) }}" class="w-10">
            <span class="ml-3">{{ DB::table('system_abouts')->value('about_name') }}</span>
        </nav>

        <!--  end::navbar   -->
        <div class="flex flex-1 overflow-hidden justify-center items-center">
            @yield('content')
        </div>

        @yield('footer')
    </div>
</body>

</html>
