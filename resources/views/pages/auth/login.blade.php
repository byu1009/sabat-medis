<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>Login</title>
</head>

<style>
    #spinner-div {
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        text-align: center;
        background-color: rgba(61, 57, 57, 0.8);
        z-index: 2;
    }

    body {
        background-image: url("{{ asset('asset/image/background/sunset.jpg') }}");
    }
</style>

<body class="bg-cover" style="backdrop-filter: blur(12px);">
    <!-- Specify a custom Tailwind configuration -->
    <script type="tailwind-config">
        {
            theme: {
                extend: {
                colors: {
                    gray: colors.blueGray,
                    pink: colors.fuchsia,
                }
                }
            }
        }
    </script>

    <!-- Snippet -->
    {{-- <section class="flex flex-col justify-center antialiased bg-gray-300 text-gray-600 min-h-screen p-4"> --}}
    <section class="flex flex-col justify-center antialiased text-gray-600 min-h-screen p-4">
        <div class="h-full">
            <!-- Card -->
            <div class="max-w-[360px] mx-auto">
                <div class="bg-white shadow-xl rounded-lg mt-9">
                    <!-- Card header -->
                    <header class="text-center px-5 pb-5">
                        <!-- Avatar -->
                        <div class="inline-flex -mt-9 w-[72px] h-[72px] fill-current bg-white rounded-full border-4 border-white box-content shadow mb-3" viewBox="0 0 72 72">
                            <section class="hero container max-w-screen-lg">
                                <img src="{{ asset('asset/image/about/prog-1.png') }}" class="mx-auto" width="60">
                            </section>
                        </div>
                        <!-- Card name -->
                        <h3 class="text-xl font-bold text-gray-900 mb-1">RSU COBA COBA</h3>
                        <div class="text-sm font-medium text-gray-500">Login</div>
                    </header>
                    <!-- Card body -->
                    <div class="bg-gray-100 text-center px-5 py-6">
                        <div class="text-sm mb-6 text-left" id="comehello"><span class="font-semibold">Masukkan aksesmu, untuk masuk kedalam sistem!</span></div>

                        <div id="form-username">
                            <div class="flex shadow-sm rounded">
                                <div class="flex-grow">
                                    <input id="username" class="text-sm text-gray-800 bg-white rounded leading-5 py-2 px-3 placeholder-gray-400 w-full border border-transparent focus:border-blue-300 focus:ring-0" type="text" placeholder="Username" aria-label="Username" autocomplete="off" autofocus />
                                </div>
                            </div>
                            <div class="text-right mt-4">
                                <button type="button" id="btn-username" class="font-semibold text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 shadow transition duration-150 ease-in-out bg-blue-500 hover:bg-blue-600 text-white focus:outline-none focus-visible:ring-2">Lanjut</button>
                            </div>
                        </div>

                        <div id="form-password" class="hidden">
                            <div class="flex shadow-sm rounded">
                                <div class="flex-grow">
                                    <input id="password" class="text-sm text-gray-800 bg-white rounded leading-5 py-2 px-3 placeholder-gray-400 w-full border border-transparent focus:border-blue-300 focus:ring-0" type="password" placeholder="Password" aria-label="Password" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mt-4">
                                <div class="text-left">
                                    <button type="button" id="btn-kembali" class="font-semibold text-sm inline-flex items-center justify-center px-3 py-2 leading-5 transition duration-150 ease-in-out focus:outline-none focus-visible:ring-2 text-blue-600">Kembali</button>
                                </div>
                                <div class="text-right">
                                    <button type="button" id="btn-login" class="font-semibold text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 shadow transition duration-150 ease-in-out bg-blue-500 hover:bg-blue-600 text-white focus:outline-none focus-visible:ring-2">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/sweetalert.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#btn-username').on('click', function () {
                var username = $('#username').val();

                if (username == '') {
                    Swal.fire({
                        position: 'middle',
                        icon: 'error',
                        html: '<b>USERNAME</b> harus diisi',
                        showConfirmButton: false,
                        timer: 2000
                    })
                } else {
                    $('#comehello').html('Hello <span class="font-bold uppercase">' + username + '</span>, Ayo masukkan passwordmu!');
                    $('#form-username').addClass('hidden');
                    $('#form-password').removeClass('hidden');
                    $('#password').focus();
                }
            });

            $('#btn-login').on('click', function () {
                var username = $('#username').val();
                var password = $('#password').val();

                if (password == '') {
                    Swal.fire({
                        position: 'middle',
                        icon: 'error',
                        html: '<b>PASSWORD</b> harus diisi',
                        showConfirmButton: false,
                        timer: 2000
                    })
                } else {
                    $.ajax({
                        method  : "POST",
                        url     : "{{ route('login.post') }}",
                        data    : {
                            "username"  : username,
                            "password"  : password,
                            "_token"    : "{{ csrf_token() }}",
                        },
                        beforeSend : function () {
                            $('#spinner-div').show();
                        },
                        success : function (data) {
                            if (data['code'] != 200) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    html: data['message'],
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    html: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                                setTimeout(() => {
                                    window.location.href = data['redirect']
                                }, 2000);
                            }
                        },
                        complete : function() {
                            $('#spinner-div').hide();
                        }
                    });
                }
            });

            $('#btn-kembali').on('click', function () {
                $('#form-username').removeClass('hidden');
                $('#form-password').addClass('hidden');
                $('#password').val('');
                $('#comehello').html('<span class="font-semibold">Masukkan aksesmu, untuk masuk kedalam sistem!</span>');
            });
        });
    </script>

    <div id="spinner-div" class="pt-5">
        <div class="h-screen flex items-center justify-center">
            <img src="{{ asset('asset/image/loading/Rhombus.gif') }}" alt="">
        </div>
    </div>

</body>

</html>
