<?php

namespace Database\Seeders;

use App\Models\SabatmedisVisit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SabatmedisVisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SabatmedisVisit::create([
            'visit_code' => '1',
            'visit_name' => 'Rujukan FKTP',
            'visit_status' => '1'
        ]);

        SabatmedisVisit::create([
            'visit_code' => '2',
            'visit_name' => 'Rujukan Internal',
            'visit_status' => '1'
        ]);

        SabatmedisVisit::create([
            'visit_code' => '3',
            'visit_name' => 'Kontrol',
            'visit_status' => '1'
        ]);

        SabatmedisVisit::create([
            'visit_code' => '4',
            'visit_name' => 'Rujukan Antar RS',
            'visit_status' => '1'
        ]);
    }
}
