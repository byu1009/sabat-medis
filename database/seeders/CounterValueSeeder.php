<?php

namespace Database\Seeders;

use App\Models\CounterValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CounterValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $multiValue = [
            [
                'cvalue_name' => 'Register',
                'cvalue_image' => 'asset/image/kiosk/counter.jpg',
                'cvalue_desc' => 'Pilihan ini jika Anda ingin <span class="font-bold capitalize">mendaftar pemeriksaan</span> atau Anda merupakan <span class="font-bold capitalize">pasien baru</span>',
                'cvalue_link' => '/kiosk/get-ticket-counter',
                'cvalue_prefix' => 'a',
                'cvalue_number' => 0,
                'cvalue_status' => '1'
            ],
            [
                'cvalue_name' => 'Daftar Rawat Inap',
                'cvalue_image' => 'asset/image/kiosk/inap.jpg',
                'cvalue_desc' => 'Pilihan ini jika Anda ingin <span class="font-bold capitalize">mendaftar rawat inap</span>',
                'cvalue_link' => '/kiosk/get-ticket-counter',
                'cvalue_prefix' => 'b',
                'cvalue_number' => 1,
                'cvalue_status' => '1'
            ],
            [
                'cvalue_name' => 'Klinik Spesialis',
                'cvalue_image' => 'asset/image/kiosk/klinik.jpg',
                'cvalue_desc' => 'Pilihan ini jika Anda ingin <span class="font-bold capitalize">mendaftar klinik spesialis</span> atau <span class="font-bold capitalize">kontrol</span>',
                'cvalue_link' => '/kiosk/clinic',
                'cvalue_prefix' => null,
                'cvalue_number' => 10,
                'cvalue_status' => '1'
            ]
        ];

        CounterValue::insert($multiValue);
    }
}
