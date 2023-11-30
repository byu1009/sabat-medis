<?php

function checkhari($angka)
{
    $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $num = date('N', strtotime($angka));
    return $hari[$num];
}

function checkharimili($tanggal)
{
    $hari = array(
        1 => 'SENIN',
        'SELASA',
        'RABU',
        'KAMIS',
        'JUMAT',
        'SABTU',
        'MINGGU'
    );

    $num = date('N', strtotime(date('Y-m-d', strtotime($tanggal))));
    echo $hari[$num];
}

function checkbulan($angka)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    echo $bulan[$angka];
}
