<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PengetahuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengetahuans = [
            ['gejala_id' => 1, 'believe' => 1, 'plausability' => 0, 'diagnosa_check' => json_encode(["p1", "p2", "p3"])],
            ['gejala_id' => 2, 'believe' => 0.6, 'plausability' => 0.4, 'diagnosa_check' => json_encode(["p1"])],
            ['gejala_id' => 3, 'believe' => 0.2, 'plausability' => 0.8, 'diagnosa_check' => json_encode(["p1", "p2", "p3"])],
            ['gejala_id' => 4, 'believe' => 0.6, 'plausability' => 0.4, 'diagnosa_check' => json_encode(["p1", "p2", "p3"])],
            ['gejala_id' => 5, 'believe' => 0.6, 'plausability' => 0.4, 'diagnosa_check' => json_encode(["p1", "p2", "p3"])],
            ['gejala_id' => 6, 'believe' => 0.8, 'plausability' => 0.2, 'diagnosa_check' => json_encode(["p1"])],
            ['gejala_id' => 7, 'believe' => 0.8, 'plausability' => 0.2, 'diagnosa_check' => json_encode(["p1"])],
            ['gejala_id' => 8, 'believe' => 0.2, 'plausability' => 0.8, 'diagnosa_check' => json_encode(["p2", "p3"])],
            ['gejala_id' => 9, 'believe' => 0.6, 'plausability' => 0.4, 'diagnosa_check' => json_encode(["p1", "p2"])],
            ['gejala_id' => 10, 'believe' => 0.8, 'plausability' => 0.2, 'diagnosa_check' => json_encode(["p2", "p3"])],
            ['gejala_id' => 11, 'believe' => 0.2, 'plausability' => 0.8, 'diagnosa_check' => json_encode(["p2", "p3"])],
            ['gejala_id' => 12, 'believe' => 0.6, 'plausability' => 0.4, 'diagnosa_check' => json_encode(["p2", "p3"])],
            ['gejala_id' => 13, 'believe' => 0.6, 'plausability' => 0.4, 'diagnosa_check' => json_encode(["p2"])],
            ['gejala_id' => 14, 'believe' => 0.2, 'plausability' => 0.8, 'diagnosa_check' => json_encode(["p3"])],
            ['gejala_id' => 15, 'believe' => 0.6, 'plausability' => 0.4, 'diagnosa_check' => json_encode(["p3"])],
            ['gejala_id' => 16, 'believe' => 0.6, 'plausability' => 0.4, 'diagnosa_check' => json_encode(["p2", "p3"])],
            ['gejala_id' => 17, 'believe' => 0.6, 'plausability' => 0.4, 'diagnosa_check' => json_encode(["p1", "p2", "p3"])],
            ['gejala_id' => 18, 'believe' => 1, 'plausability' => 0, 'diagnosa_check' => json_encode(["p2", "p3"])],
            ['gejala_id' => 19, 'believe' => 0.6, 'plausability' => 0.4, 'diagnosa_check' => json_encode(["p3"])],
            ['gejala_id' => 20, 'believe' => 0.2, 'plausability' => 0.8, 'diagnosa_check' => json_encode(["p3"])],
            ['gejala_id' => 21, 'believe' => 0.6, 'plausability' => 0.4, 'diagnosa_check' => json_encode(["p1", "p2", "p3"])],
            ['gejala_id' => 22, 'believe' => 0.2, 'plausability' => 0.8, 'diagnosa_check' => json_encode(["p3"])],
            ['gejala_id' => 23, 'believe' => 0.8, 'plausability' => 0.2, 'diagnosa_check' => json_encode(["p2", "p3"])],
        ];

        DB::table('pengetahuans')->insert($pengetahuans);
    }
}
