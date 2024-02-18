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
        Schema::create('analizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('garden_id');
            $table->string('jenis');
            $table->integer('keasaman')->default(0);
            $table->integer('kelembaban')->default(0);
            $table->integer('pupuk_perbatang');
            $table->string('pupuk_dibutuhkan');
            $table->string('jadwal_mupuk');
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analizes');
    }
};
