@extends('layouts.kiosk')

@section('content')
    @php
        $number_numpad = [1,2,3,4,5,6,7,8,9,0];
    @endphp

    <table id="dataex" hidden>
        <tr>
            <td>mrnum</td>
            <td><input type="text" name="datae-mrnum" id="datae-mrnum"></td>
        </tr>
        <tr>
            <td>pay</td>
            <td><input type="text" id="datae-pay"></td>
        </tr>
        <tr>
            <td>visit</td>
            <td><input type="text" id="datae-visit"></td>
        </tr>
        <tr>
            <td>visitde</td>
            <td><input type="text" id="datae-visitde"></td>
        </tr>
        <tr>
            <td>date</td>
            <td><input type="text" id="datae-date"></td>
        </tr>
        <tr>
            <td>day</td>
            <td><input type="text" id="datae-day"></td>
        </tr>
        <tr>
            <td>clinic</td>
            <td><input type="text" id="datae-clinic"></td>
        </tr>
        <tr>
            <td>doctor</td>
            <td><input type="text" id="datae-doctor"></td>
        </tr>
    </table>

    <div id="formpatient" class="relative flex flex-col text-gray-700 bg-white shadow-md w-1/3 rounded-xl bg-clip-border">
        <div class="p-6">
            <div class="text-right">Nomor Rekam Medis Anda</div>
            <div class="text-right font-semibold text-[30pt] h-16" id="mrnumber"></div>

            <hr class="mb-4 border-b border-gray-700">

            <div class="flex gap-4">
                <div class="w-4/6">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        {{-- <div class="{{ $classe }}">1</div>
                        <div class="{{ $classe }}">2</div>
                        <div class="{{ $classe }}">3</div>
                        <div class="{{ $classe }}">4</div>
                        <div class="{{ $classe }}">5</div>
                        <div class="{{ $classe }}">6</div>
                        <div class="{{ $classe }}">7</div>
                        <div class="{{ $classe }}">8</div>
                        <div class="{{ $classe }}">9</div>
                        <div class="{{ $classe }} col-span-3">0</div> --}}
                        @for ($i = 0; $i < count($number_numpad); $i++)
                            <div class="justify-center items-center {{ ($number_numpad[$i] == 0) ? 'col-span-3' : '' }}">
                                <button type="button" data-numpad="{{ $number_numpad[$i] }}" class="calc text-white h-14 w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold text-[22pt] rounded-lg p-2.5 text-center justify-center items-center inline-flex items-center me-2">
                                    {{ $number_numpad[$i] }}
                                </button>
                            </div>
                        @endfor
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

    <div id="formpayment" class="relative hidden flex flex-col text-gray-700 bg-white shadow-md w-1/3 rounded-xl bg-clip-border">
        <div class="p-6">
            <div class="text-right">Pilih penjaminan yang anda gunakan</div>

            <div class="mt-6" id="contentpayment">

            </div>
        </div>
    </div>

    <div id="formvisit" class="relative hidden flex flex-col text-gray-700 bg-white shadow-md w-1/3 rounded-xl bg-clip-border">
        <div class="p-6">
            <div class="text-right">Pilih jenis kunjungan</div>

            <div class="mt-6" id="contentvisit"></div>
        </div>
    </div>

    <div id="formdate" class="relative hidden flex flex-col text-gray-700 bg-white shadow-md w-3/4 rounded-xl bg-clip-border">
        <div class="p-6">
            <div class="text-right">Pilih tanggal periksa</div>

            <?php
                $hari = [];

                for ($i=0; $i < 30; $i++) {
                    $hari[] = date('Y-m-d', strtotime("+" . $i . " day"));
                }
            ?>

            <div class="grid grid-cols-8 gap-4 mt-4">
                @foreach ($hari as $h)
                    <div data-date="{{ $h }}" data-day="{{ strtoupper(checkhari($h)) }}" class="btndate text-center bg-gray-100 hover:opacity-75 hover:scale-110">
                        @php
                            $chari = checkhari($h);
                        @endphp

                        @if (checkhari($h) == 'Minggu')
                            <div class="bg-red-600 text-white rounded-t-lg">{{ checkhari($h) }}</div>
                            <div class="text-2xl font-semibold my-2">{{ date('d', strtotime($h)) }}</div>
                            <div class="bg-gray-400 text-white rounded-b-lg">{{ checkbulan(date('m', strtotime($h))) }}</div>
                        @else
                            <div class="bg-green-600 text-white rounded-t-lg">{{ checkhari($h) }}</div>
                            <div class="text-2xl font-semibold my-2">{{ date('d', strtotime($h)) }}</div>
                            <div class="bg-gray-400 text-white rounded-b-lg">{{ checkbulan(date('m', strtotime($h))) }}</div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="formclinic" class="relative hidden flex flex-col text-gray-700 bg-white shadow-md w-3/4 rounded-xl bg-clip-border">
        <div class="p-6">
            <div class="text-right">Pilih klinik tujuan</div>

            <div class="mt-6 grid grid-cols-3 gap-2" id="contentclinic"></div>
        </div>
    </div>

    <div id="formdoctor" class="relative hidden flex flex-col text-gray-700 bg-white shadow-md w-3/4 rounded-xl bg-clip-border">
        <div class="p-6">
            <div class="text-right">Pilih dokter</div>

            <div class="text-center" id="titledocter"></div>

            <div class="mt-6 grid grid-cols-3 gap-2" id="contentdoctor"></div>
        </div>
    </div>

    <div id="formconfirm" class="relative hidden flex flex-col text-gray-700 bg-white shadow-md w-3/4 rounded-xl bg-clip-border">
        <div class="p-6">
            <div class="text-right">Konfirmasi Pendaftaran</div>

            <div class="mt-6 flex gap-6">
                <div class="w-4/6">
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <td>NORM</td>
                                <td>:</td>
                                <td class="font-bold w-[80%]" id="confmrnum"></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td class="font-bold" id="confname"></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="relative py-4">
                                        <div class="absolute inset-0 flex items-center">
                                            <div class="w-full border-b border-gray-300"></div>
                                        </div>
                                        <div class="relative flex justify-center">
                                            <span class="bg-white px-4 text-sm text-gray-500">DETAIL TUJUAN PENDAFTARAN</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Rencana Periksa</td>
                                <td>:</td>
                                <td class="font-bold" id="confdate"></td>
                            </tr>
                            <tr>
                                <td>Tujuan Klinik</td>
                                <td>:</td>
                                <td class="font-bold" id="confclinic"></td>
                            </tr>
                            <tr>
                                <td>Dokter</td>
                                <td>:</td>
                                <td class="font-bold" id="confdoctor"></td>
                            </tr>
                            <tr>
                                <td>Penjaminan</td>
                                <td>:</td>
                                <td class="font-bold" id="confpayment"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-2/6">
                    <div class="text-justify">Silahkan tanda tangan untuk dapat melanjutkan proses pendaftaran</div>
                </div>
            </div>
        </div>
    </div>

    <!---Modal -->
    <div class="fixed hidden insert-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="idpatient">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlnx="http://www.w.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <h3 class="text-lg leading-6 font-medium text-gray-900">Data Pasien</h3>

                <div class="mt-2 px-7 py-3 text-left">
                    <div>Nama Pasien</div>
                    <div class="font-bold uppercase" id="patient-name"></div>
                    <div>Tempat, Tanggal Lahir</div>
                    <div class="font-bold uppercase" id="patient-dpob"></div>
                    <div>Alamat</div>
                    <div class="font-bold" id="patient-add"></div>
                    <p class="text-sm text-gray-700 mt-4">Pastikan identitas benar dan sesuai, untuk melanjutkan klik tombol <b>LANJUT</b>.</p>
                </div>

                <div class="items-center px-4 py-3 flex gap-4">
                    <div class="w-1/2">
                        <button onclick="close_idpatient()" class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                            Bukan, saya
                        </button>
                    </div>
                    <div class="w-1/2">
                        <button id="btnpatientapprove" class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                            LANJUT
                        </button>
                    </div>
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
            let value = $(this).data('numpad');
            field(value);
        });

        function field(value) {
            inputValue.html(inputValue.html() + value);
        }

        $("#correct").click(function () {
            inputValue.html("");
        });

        // MODAL IDPATIENT

        function close_idpatient() {
            $('#idpatient').addClass('hidden');
            $('#mrnumber').html('');

            $('#patient-name').html('');
            $('#patient-dpob').html('');
            $('#patient-add').html('');

            $('#idpatient').addClass('hidden');
        }

        function open_formpayment() {
            $('#formpayment').removeClass('hidden');
            $('#formpatient').addClass('hidden');

            $('#back_to').removeClass('hidden');
            $('#back_to_title').html('KEMBALI');
            $('#back_to').attr('onclick', 'back_to_patient();');

            $.ajax({
                method  : "GET",
                url     : "{{ route('kiosk.clinic.payment') }}",
                beforeSend: function () {
                    $('.loader').css("display", "block");
                },
                success : function (data) {
                    $('#contentpayment').empty();
                    $.each(data, function (key, value) {
                        $('#contentpayment').append('<div data-pay="' + value['pay_code'] + '" class="btnpay text-white text-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg px-5 py-2.5 my-4 me-2 mb-2 focus:outline-none">\
                            ' + value['pay_name'] +'\
                            </div>');
                    });
                },
                complete: function () {
                    $('.loader').css("display", "none");
                }
            });
        }

        function open_formvisit() {
            $('#formvisit').removeClass('hidden');

            $('#back_to_title').html('KEMBALI');
            $('#back_to').attr('onclick', 'back_to_payment();');

            $.ajax({
                method  : "GET",
                url     : "{{ route('kiosk.clinic.visit') }}",
                beforeSend: function () {
                    $('.loader').css("display", "block");
                },
                success : function (data) {
                    $('#contentvisit').empty();
                    $.each(data, function (key, value) {
                        $('#contentvisit').append('<div data-visit="' + value['visit_code'] + '" data-visitde="' + value['visit_name'] + '" class="btnvisit text-white text-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg px-5 py-2.5 my-4 me-2 mb-2 focus:outline-none">\
                            ' + value['visit_name'] +'\
                            </div>');
                    });
                },
                complete: function () {
                    $('.loader').css("display", "none");
                }
            });
        }

        function open_date() {
            $('#formdate').removeClass('hidden');

            $('#back_to_title').html('KEMBALI');
            $('#back_to').attr('onclick', 'back_to_payment();');
        }

        function open_clinic() {
            $('#formdate').addClass('hidden');
            $('#formclinic').removeClass('hidden');
            $('#formdoctor').addClass('hidden');

            $('#back_to_title').html('KEMBALI');
            $('#back_to').attr('onclick', 'back_to_date();');


            $.ajax({
                method  : "GET",
                url     : "{{ route('kiosk.clinic.curl_clinic_sync') }}",
                beforeSend: function () {
                    $('.loader').css("display", "block");
                },
                success : function (data) {
                    $('#contentclinic').empty();
                    $.each(data, function (key, value) {
                        $('#contentclinic').append('<div data-clinic="' + value['clinic_code'] + '" class="btnclinic text-white text-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg px-5 py-2.5 me-2 mb-2 focus:outline-none">\
                            ' + value['clinic_name'] +'\
                            </div>');
                    });
                },
                complete: function () {
                    $('.loader').css("display", "none");
                }
            });
        }

        function open_doctor() {
            $('#formclinic').addClass('hidden');
            $('#formdoctor').removeClass('hidden');

            $('#back_to_title').html('KEMBALI');
            $('#back_to').attr('onclick', 'back_to_clinic();');

            $.ajax({
                method  : "GET",
                url     : "{{ route('kiosk.clinic.curl_doctor_sync') }}",
                data    : {
                    day    : $('#datae-day').val(),
                    clinic  : $('#datae-clinic').val()
                },
                beforeSend: function () {
                    $('.loader').css("display", "block");
                },
                success : function (data) {
                    $('#titledocter').html('Daftar dokter praktek pada <b>' + $('#datae-day').val() + ', ' + $('#datae-date').val() + '</b>');

                    var myObject = JSON.parse(data);

                    $('#contentdoctor').empty();

                    if (myObject['data'] == '') {
                        var timeout = 2000;
                        Swal.fire({
                            position: "middle",
                            icon: "error",
                            title: myObject['message'],
                            showConfirmButton: false,
                            timer: timeout
                        });

                        setTimeout(() => {
                            open_clinic();
                            $('#datae-clinic').val('');
                        }, timeout);
                    } else {
                        $.each(myObject['data'], function (key, value) {
                            $('#contentdoctor').append('<div data-doctor="' + value[0] + '" class="btndoctor text-white text-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg px-5 py-2.5 me-2 mb-2 focus:outline-none">\
                                ' + value[1] +'\
                                </div>');
                        });
                    }
                },
                complete: function () {
                    $('.loader').css("display", "none");
                }
            });
        }

        function open_confirm() {
            $('#formdoctor').addClass('hidden');
            $('#formconfirm').removeClass('hidden');

            $('#back_to').addClass('hidden');

            var tempDate = new Date($('#datae-date').val());
            var formattedDate = [tempDate.getDate(), tempDate.getMonth() + 1, tempDate.getFullYear()].join('-');

            $('#confdate').html($('#datae-day').val() + ', ' +formattedDate);

            // CONFIRM PASIEN
            $.ajax({
                method  : "POST",
                url     : "{{ route('kiosk.clinic.curl_patient_check') }}",
                data    : {
                    mrnum   : $('#datae-mrnum').val(),
                    _token  : "{{ csrf_token() }}"
                },
                success : function (data) {
                    var arr = JSON.parse(data);

                    $('#confmrnum').html(arr['data']['no_rkm_medis']);
                    $('#confname').html(arr['data']['nm_pasien']);
                },
            });

            // CONFIRM CLINIC
            $.ajax({
                method  : "GET",
                url     : "{{ route('kiosk.clinic.confirm_clinic') }}",
                data    : {
                    clinic   : $('#datae-clinic').val(),
                },
                success : function (data) {
                    var arr = JSON.parse(data);

                    $('#confclinic').html(arr[0]['nama']);

                },
            });

            // CONFIRM DOCTOR
            $.ajax({
                method  : "GET",
                url     : "{{ route('kiosk.clinic.confirm_doctor') }}",
                data    : {
                    doctor   : $('#datae-doctor').val(),
                },
                success : function (data) {
                    var arr = JSON.parse(data);

                    $('#confdoctor').html(arr[0]['nama']);

                },
            });

            // CONFIRM PAYMENT
            $.ajax({
                method  : "GET",
                url     : "{{ route('kiosk.clinic.confirm_payment') }}",
                data    : {
                    payment   : $('#datae-pay').val(),
                },
                success : function (data) {
                    var arr = JSON.parse(data);

                    if (arr[0]['kode'] == 'A09') {
                        $('#confpayment').html(arr[0]['nama']);
                    } else {
                        $('#confpayment').html(arr[0]['nama'] + ' - ' + $('#datae-visitde').val());
                    }
                },
            });
        }

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
                    $.ajax({
                        method  : "POST",
                        url     : "{{ route('kiosk.clinic.curl_patient_check') }}",
                        data    : {
                            mrnum   : mrnum,
                            _token  : "{{ csrf_token() }}"
                        },
                        beforeSend: function () {
                            $('.loader').css("display", "block");
                        },
                        success : function (data) {
                            var arr = JSON.parse(data);

                            if (arr['data'] == null) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    html: arr['message'],
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            } else {
                                $('#idpatient').removeClass('hidden');

                                $('#patient-name').html(arr['data']['nm_pasien']);
                                $('#patient-dpob').html(arr['data']['tmp_lahir'] + ', ' + arr['data']['tgl_lahir']);
                                $('#patient-add').html(arr['data']['alamat']);
                            }
                        },
                        complete: function () {
                            $('.loader').css("display", "none");
                        }
                    });
                }
            });

            $('#btnpatientapprove').on('click', function () {
                $('#datae-mrnum').val($('#mrnumber').text());

                close_idpatient();

                open_formpayment();
            });

            $('#formpayment').on('click', '.btnpay',function () {
                var payment = $(this).data('pay');

                $('#datae-pay').val(payment);

                $('#formpayment').addClass('hidden');

                if (payment != 'A09') {
                    open_formvisit();
                } else {
                    open_date();
                }
            });

            $('#formvisit').on('click', '.btnvisit',function () {
                $('#datae-visit').val($(this).data('visit'));
                $('#datae-visitde').val($(this).data('visitde'));

                $('#formvisit').addClass('hidden');
                $('#formdate').removeClass('hidden');
            });

            $('#formdate').on('click', '.btndate', function () {
                $('#datae-date').val($(this).data('date'));
                $('#datae-day').val($(this).data('day'));

                open_clinic();
            });

            $('#formclinic').on('click', '.btnclinic', function () {
                $('#datae-clinic').val($(this).data('clinic'));

                open_doctor();
            });

            $('#formdoctor').on('click', '.btndoctor', function () {
                $('#datae-doctor').val($(this).data('doctor'));

                open_confirm();
            });
        });

        // BACK
        function back_to_patient() {
            $('#formpatient').removeClass('hidden');
            $('#formpayment').addClass('hidden');

            $('#datae-mrnum').val('');

            $('#back_to').addClass('hidden');
        }

        function back_to_payment() {
            $('#formpayment').removeClass('hidden');
            $('#formvisit').addClass('hidden');
            $('#formdate').addClass('hidden');

            $('#datae-pay').val('');
            $('#datae-visit').val('');

            $('#back_to_title').html('KEMBALI');
            $('#back_to').attr('onclick', 'back_to_patient();');
        }

        function back_to_date() {
            $('#formdate').removeClass('hidden');
            $('#formclinic').addClass('hidden');

            $('#datae-date').val('');
            $('#datae-day').val('');

            $('#back_to_title').html('KEMBALI');
            $('#back_to').attr('onclick', 'back_to_payment();');
        }

        function back_to_clinic() {
            $('#formclinic').removeClass('hidden');
            $('#formdoctor').addClass('hidden');

            $('#datae-clinic').val('');

            $('#back_to_title').html('KEMBALI');
            $('#back_to').attr('onclick', 'back_to_date();');
        }

        // function set() {
        //     $('#formpatient').addClass('hidden');
        //     $('#formconfirm').removeClass('hidden');

        //     open_confirm();
        // }

        // set();
    </script>
@endsection

@section('footer')
    <div class="flex bg-lime-200 py-3 justify-center">
        <a href="{{ route('kiosk') }}">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center mr-2">
                <svg class="w-3.5 h-3.5 mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                </svg>
                MENU UTAMA
            </button>
        </a>

        <button type="button" onClick="window.location.reload(true);" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center mr-2">
            <svg class="w-3.5 h-3.5 mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
            </svg>
            REFRESH
        </button>

        <button type="button" id="back_to" class="hidden text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center mr-2">
            <svg class="w-3.5 h-3.5 mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
            </svg>
            <span id="back_to_title"></span>
        </button>
    </div>
@endsection
