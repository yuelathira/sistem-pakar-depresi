<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kondisis')->insert(
            [
                'kondisi' => 'Ya',
            ],
        );

        DB::table('kondisis')->insert(
            [
                'kondisi' => 'Tidak',
            ],
        );
    }
}
