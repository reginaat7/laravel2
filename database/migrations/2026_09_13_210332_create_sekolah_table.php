<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('npsn')->unique();
            $table->string('nama_sekolah');
            $table->enum('tingkat', ['SD', 'SMP', 'SMA', 'SMK']);
            $table->text('alamat_sekolah');
            $table->string('foto_sekolah')->nullable();

            // Foreign Key ke DapurSPPG
            $table->foreignId('dapur_sppg_id')->nullable()->constrained('dapur_sppg')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sekolah');
    }
};