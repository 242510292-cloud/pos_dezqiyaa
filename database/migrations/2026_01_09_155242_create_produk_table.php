<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('stok')->default(0);
            $table->foreignId('jenis_produk_id')
                ->nullable()
                ->constrained('jenis_produks')
                ->nullOnDelete();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};