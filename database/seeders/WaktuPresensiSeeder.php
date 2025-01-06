<?php

namespace Database\Seeders;

use App\Models\WaktuPresensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaktuPresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WaktuPresensi::create([
            'presensi_masuk' => '06:15:00',
            'batas_presensi_masuk' => '07:15:00',
            'presensi_pulang' => '16:15:00',
            'batas_presensi_pulang' => '18:15:00',
        ]);
    }
}
