<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gejalas = [
            ['kodegejala' => 1, 'namagejala' => "Merasa sedih"],
            ['kodegejala' => 2, 'namagejala' => "Kelelahan melakukan aktivitas"],
            ['kodegejala' => 3, 'namagejala' => "Berkecil hati mengenai masa depan"],
            ['kodegejala' => 4, 'namagejala' => "Mempunyai gangguan tidur (insomnia atau hipersomnia)"],
            ['kodegejala' => 5, 'namagejala' => "Sering cemas"],
            ['kodegejala' => 6, 'namagejala' => "Lebih sering terlihat murung"],
            ['kodegejala' => 7, 'namagejala' => "Kehilangan minat dalam kegiatan atau hobi"],
            ['kodegejala' => 8, 'namagejala' => "Merasa kesepian"],
            ['kodegejala' => 9, 'namagejala' => "Kurang konsentrasi"],
            ['kodegejala' => 10, 'namagejala' => "Sering menangis dengan alasan yang tidak jelas"],
            ['kodegejala' => 11, 'namagejala' => "Kecewa dengan diri sendiri"],
            ['kodegejala' => 12, 'namagejala' => "Terganggu dengan segala hal"],
            ['kodegejala' => 13, 'namagejala' => "Mempunyai perasaan bersalah"],
            ['kodegejala' => 14, 'namagejala' => "Mempunyai perasaan dihukum"],
            ['kodegejala' => 15, 'namagejala' => "Mempunyai perasaan benci terhadap diri sendiri"],
            ['kodegejala' => 16, 'namagejala' => "Mudah tersinggung atau marah"],
            ['kodegejala' => 17, 'namagejala' => "Kehilangan selera makan"],
            ['kodegejala' => 18, 'namagejala' => "Mempunyai pikiran untuk bunuh diri"],
            ['kodegejala' => 19, 'namagejala' => "Lebih suka menyendiri"],
            ['kodegejala' => 20, 'namagejala' => "Kurang percaya diri"],
            ['kodegejala' => 21, 'namagejala' => "Sulit mengambil keputusan"],
            ['kodegejala' => 22, 'namagejala' => "Ada perubahan penambahan atau penurunan berat badan"],
            ['kodegejala' => 23, 'namagejala' => "Sulit melakukan kegiatan dengan baik"],
        ];

        DB::table('gejalas')->insert($gejalas);
    }
}























