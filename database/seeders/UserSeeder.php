<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Bayu Nugroho',
            'username' => 'masb',
            'password' => bcrypt('12345678'),
            'level' => 0,
            'group' => null,
            'status' => '1'
        ]);
    }
}
