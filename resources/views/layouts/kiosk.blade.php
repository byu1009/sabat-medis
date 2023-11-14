<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/sweetalert.js') }}"></script>
    <script defer src="{{ asset('asset/js/alpinejs@3.13.1.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<style>
    body {
        font-family: system-ui;
    }

    .loader {
        display: none;
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 50%;
        z-index: 9999;
        background: url('//upload.wikimedia.org/wikipedia/commons/thumb/e/e5/Phi_fenomeni.gif/128px-Phi_fenomeni.gif') 50% 50% no-repeat;
        /* background: url({{ asset('assets/image/dots.gif') }}) 10% 10% no-repeat; */
    }

    #journal-scroll::-webkit-scrollbar {
        width: 4px;
        cursor: pointer;
        /*background-color: rgba(229, 231, 235, var(--bg-opacity));*/

    }
    #journal-scroll::-webkit-scrollbar-track {
        background-color: rgba(229, 231, 235, var(--bg-opacity));
        cursor: pointer;
        /*background: red;*/
    }
    #journal-scroll::-webkit-scrollbar-thumb {
        cursor: pointer;
        background-color: #a0aec0;
        /*outline: 1px solid slategrey;*/
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

        <div class="loader"></div>
    </div>
</body>

</html>
