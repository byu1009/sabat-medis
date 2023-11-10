<?php

namespace Database\Seeders;

use App\Models\SystemAbout;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SystemAbout::create([
            'about_name' => 'RSU INDO SEHAT KARANGANYAR',
            'about_address' => 'Jl. Solo - Sragen KM.11 Karanganyar',
            'about_telp' => '(0271) 6882218',
            'about_image' => 'asset/image/about/logo_is.jpg'
        ]);
    }
}
