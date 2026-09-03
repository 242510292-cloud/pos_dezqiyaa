<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel jenis_produks sudah ada di database,
        // jadi tidak perlu dibuat ulang.
    }

    public function down(): void
    {
        // Jangan hapus tabel karena tabel sudah digunakan.
    }
};