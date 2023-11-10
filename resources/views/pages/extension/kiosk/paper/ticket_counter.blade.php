<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiket Counter</title>

    <script src="{{ asset('asset/js/sweetalert.js') }}"></script>
</head>

<style>
    body {
        font-family: system-ui;
    }
</style>

<body>
    <div style="text-align: center">
        <img src="{{ asset('asset/image/about/logo_is.jpg') }}" alt="" width="32">
        <br>
        <b>{{ $about[0]['about_name'] }}</b>
        <br>
        <span>{{ $about[0]['about_address'] }}</span>
    </div>

    <hr>

    <span>Nomor antrian anda :</span>

    <div style="text-align: center; font-size: 20pt;">
        <b>{{ $find[0]['counter_queue'] }}</b>
    </div>

    <br>

    <div style="text-align: center;">
        Sisa : <b>{{ DB::table('counter_regs')->where('counter_date', date('Y-m-d'))->where('counter_prefix', $find[0]['counter_prefix'])->where('counter_status', '0')->count() - 1 }} Antrian</b>
    </div>

    <div style="text-align: center;">
        Terima kasih sudah sabar menunggu
        <br>
        Semoga lekas sembuh
    </div>

    <script>
        setTimeout(() => {
            Swal.fire({
                position: "middle",
                icon: "success",
                title: "Silahkan ambil TIKET",
                showConfirmButton: false,
                timer: 1500
            });
        }, 2000);

        setTimeout(() => {
            window.location.href = window.location.origin + '/kiosk';
        }, 3000);
    </script>

</body>

</html>
