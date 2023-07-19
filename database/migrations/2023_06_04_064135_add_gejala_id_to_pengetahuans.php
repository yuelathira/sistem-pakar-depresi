<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pengetahuans', function (Blueprint $table) {
            Schema::table('pengetahuans', function (Blueprint $table) {
                $table->foreignId('gejala_id')->constrained('gejalas');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengetahuans', function (Blueprint $table) {
            Schema::table('pengetahuans', function (Blueprint $table) {
                $table->dropForeign(['gejala_id']);
                $table->dropColumn('gejala_id');
            });
        });
    }
};
