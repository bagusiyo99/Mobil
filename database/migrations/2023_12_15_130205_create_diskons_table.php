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
        Schema::create('diskons', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_barang');
            $table->string('nama');
            $table->decimal('harga_barang', 17, 5);
            $table->string('gambar')->nullable();
            $table->text('deskripsi');
            $table->integer('diskon');
            $table->enum('kategori', ['Honda', 'Yamaha', 'Suzuki'])->nullable();
            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diskons');
    }
};
