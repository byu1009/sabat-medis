<?php

namespace Database\Seeders;

use App\Models\SystemSecret;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSecretSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SystemSecret::create([
            'secr_used' => 'jkn-antrol',
            'secr_url_local' => 'http://localhost/sabat-jkn/ws-bpjs',
            'secr_url_target' => 'https://apijkn.bpjs-kesehatan.go.id/antreanrs',
            'secr_const_id' => '20355',
            'secr_secret_key' => '7oPFAD4066',
            'secr_user_key' => '934e6ba2eb15ed40f3b39c759dc4e799',
            'secr_status' => '1'
        ]);
    }
}
