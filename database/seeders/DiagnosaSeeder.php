<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DiagnosaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diagnosas = [
            ['kodediagnosa' => 1, 'namadiagnosa' => "Depresi Ringan", "solusi" => "
            <ul>
            <li>Membuat jadwal atau rutinitas yang rutin dan sesuai kemampuan (misal: seminggu sekali)</li>
            <li>Mengekspresikan hal - hal yang dirasakan melalui tulisan agar hal - hal yang dirasa tidak mengganggu pikiran</li>
            <li>Menjaga pola makan dengan membuat jadwal makan dan menu makanan yang bergizi</li>
            </ul>
            "],
            ['kodediagnosa' => 2, 'namadiagnosa' => "Depresi Sedang", "solusi" => "
            <ul>
            <li>Membuat jadwal atau rutinitas yang rutin dan sesuai kemampuan (misal: seminggu sekali)</li>
            <li>Mengekspresikan hal - hal yang dirasakan melalui tulisan agar hal - hal yang dirasa tidak mengganggu pikiran</li>
            <li>Menjaga pola makan dengan membuat jadwal makan dan menu makanan yang bergizi</li>
            <li>Melakukan konseling ke psikolog atau psikiater</li>
            <li>Mengidentifikasi cognitive distortion</li>
            </ul>
            "],
            ['kodediagnosa' => 3, 'namadiagnosa' => "Depresi Berat", "solusi" => "
            <ul>
            <li>Membuat jadwal atau rutinitas yang rutin dan sesuai kemampuan (misal: seminggu sekali)</li>
            <li>Mengekspresikan hal - hal yang dirasakan melalui tulisan agar hal - hal yang dirasa tidak mengganggu pikiran</li>
            <li>Menjaga pola makan dengan membuat jadwal makan dan menu makanan yang bergizi</li>
            <li>Melakukan Cognitive-Behavior Therapy (CBT) dengan psikolog</li>
            <li>Mengkonsumsi obat berdasarkan resep psikiater</li>
            </ul>
            "],
        ];

        DB::table('diagnosas')->insert($diagnosas);
    }
}
