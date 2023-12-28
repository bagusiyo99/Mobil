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
        Schema::create('penyewas', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('tujuan');
            $table->text('alamat');
            $table->date('tgl_boking'); // Menggunakan 'tgl_boking' untuk nama kolom
            $table->date('tgl_selesai'); // Menggunakan 'tgl_selesai' untuk nama kolom
            $table->string('hp')->unique(); // Kolom hp memiliki tipe data string dan unik
            $table->string('jam');
            $table->unsignedBigInteger('nama_id')->nullable();
            $table->foreign('nama_id')->references('id')->on('diskons');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewas');
    }
};
