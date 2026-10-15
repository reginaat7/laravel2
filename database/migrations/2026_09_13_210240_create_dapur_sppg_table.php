<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dapur_sppg', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dapur');
            $table->string('foto')->nullable();
            $table->text('alamat');
            $table->date('tgl_berdiri');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dapur_sppg');
    }
};