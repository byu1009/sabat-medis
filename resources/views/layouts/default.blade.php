<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Abda HIS</title>

    @vite("resources/css/app.css")

    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/sweetalert.js') }}"></script>
    <script defer src="{{ asset('asset/js/alpinejs@3.13.1.js') }}"></script>
</head>

<body>
    <div class="absolute top-0 w-full">
        <!-- Slider Component Container -->
        <div class="flex flex-col mt-20" x-cloak x-data="appData()" x-init="appInit()">
            <div class="flex flex-col">
                <!-- Page Scroll Progress -->
                <div class="fixed inset-x-0 top-0 z-50 h-0.5 mt-0.5 bg-blue-500" :style="`width: ${percent}%`"></div>

                <!-- Navbar -->
                <nav class="flex gap-4 justify-start p-4 bg-white/80 backdrop-blur-md shadow-md w-full fixed top-0 left-0 right-0 z-10">
                    <div class="w-2/12 flex items-center">
                        <img class="h-10 object-cover" src="{{ asset('asset/image/about/prog-1.png') }}" alt="Store Logo">
                        <marquee class="ml-4 font-semibold text-xl">RSU COBA COBA</marquee>
                    </div>
                    <div class="w-6/12 items-center">
                        {{-- <a href="{{ route('menu') }}"> --}}
                            <button type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center mr-2">
                                <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg>
                                Menu
                            </button>
                        {{-- </a> --}}
                    </div>
                    <div class="w-4/12 flex justify-end items-center">
                        @php
                            $imurl = "https://ui-avatars.com/api/?name=" . strtr(auth()->user()->name, " ", "+") . "&size=128&background=ff4433&color=fff";
                        @endphp

                        <img src="{{ $imurl }}" class="w-7 w-7 rounded-full" alt="Profile">
                        <span class="ml-3">{{ auth()->user()->name }}</span>
                        <span class="mx-3">|</span>

                        <button type="button" id="btnout" class="font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center mr-2">
                            <svg class="fill-current h-5 w-5 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10,17V14H3V10H10V7L15,12L10,17M10,2H19A2,2 0 0,1 21,4V20A2,2 0 0,1 19,22H10A2,2 0 0,1 8,20V18H10V20H19V4H10V6H8V4A2,2 0 0,1 10,2Z" />
                            </svg>

                            Keluar
                        </button>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    @yield('menu')
    @yield('default-content')

    <script>
        const appData = () => {
            return {
                percent: 0,

                appInit() {
                    // source: https://codepen.io/A_kamel/pen/qBmmGKJ
                    window.addEventListener('scroll', () => {
                        let winScroll = document.body.scrollTop || document.documentElement.scrollTop,
                            height = document.documentElement.scrollHeight - document.documentElement.clientHeight;

                        this.percent = Math.round((winScroll / height) * 100);
                    });
                },
            };
        };
    </script>

    <script>
        $('#btnout').on('click', function () {
            Swal.fire({
                title: 'Kamu yakin ?',
                text: "Akan keluar dari aplikasi ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('authout') }}";
                }
            })
        });
    </script>
</body>

</html>
