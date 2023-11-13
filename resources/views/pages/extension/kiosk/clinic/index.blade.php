@extends('layouts.kiosk')

@section('content')
    @php
        $classe = "calc py-4 hover:bg-green-700 hover:text-white font-semibold text-2xl border-solid border border-sky-500";
    @endphp

    <div class="relative flex flex-col text-gray-700 bg-white shadow-md w-1/3 rounded-xl bg-clip-border">
        <div class="p-6">
            <div class="text-right">Nomor Rekam Medis Anda</div>
            <div class="text-right font-semibold text-[30pt] h-16" id="mrnumber"></div>

            <hr class="mb-4 border-b border-gray-700">

            <div class="flex gap-4">
                <div class="w-4/6">
                    <div class="grid grid-cols-3 text-center">
                        <div class="{{ $classe }}">1</div>
                        <div class="{{ $classe }}">2</div>
                        <div class="{{ $classe }}">3</div>
                        <div class="{{ $classe }}">4</div>
                        <div class="{{ $classe }}">5</div>
                        <div class="{{ $classe }}">6</div>
                        <div class="{{ $classe }}">7</div>
                        <div class="{{ $classe }}">8</div>
                        <div class="{{ $classe }}">9</div>
                        <div class="{{ $classe }} col-span-3">0</div>
                    </div>
                </div>
                <div class="w-2/6">
                    <button id="correct" class="inline-flex w-full mb-4 items-center h-10 px-5 text-amber-100 transition-colors font-semibold duration-150 bg-amber-700 rounded-lg focus:shadow-outline hover:bg-amber-600">
                        <svg class="w-4 h-4 mr-3 fill-current" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        <span>Correct</span>
                    </button>
                    <button id="searchpatient" class="inline-flex w-full items-center h-10 px-5 text-green-100 transition-colors font-semibold duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-600">
                        <svg class="w-4 h-4 mr-3 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-binoculars-fill" viewBox="0 0 16 16">
                            <path d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z"/>
                        </svg>
                        <span>Cari</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const inputValue = $("#mrnumber");

        //disable input from typing
        $("#mrnumber").keypress(function () {
            return false;
        });

        //add password
        $(".calc").click(function () {
            let value = $(this).text();
            field(value);
        });

        function field(value) {
            inputValue.html(inputValue.html() + value);
        }

        $("#correct").click(function () {
            inputValue.html("");
        });

        $(document).ready(function () {
            $('#searchpatient').on('click', function() {
                var mrnum = $('#mrnumber').html();

                if (mrnum == '') {
                    Swal.fire({
                        position: "middle",
                        icon: "error",
                        title: "Nomor Rekam Medis, harus diisi",
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    console.log('data');
                }
            })
        })
    </script>
@endsection

@section('footer')
    <div class="flex bg-lime-200 py-3 justify-center">
        <a href="{{ route('kiosk') }}">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-3.5 h-3.5 mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                </svg>
                MENU UTAMA
            </button>
        </a>
    </div>
@endsection
