<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'user_id',
        'nama',
        'harga_beli',
        'harga_jual',
        'stok',
        'jenis_produk_id',
        'foto',
    ];

    /**
     * Produk dibuat oleh user/kasir
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Produk memiliki jenis produk
     */
    public function jenisProduk()
    {
        return $this->belongsTo(
            JenisProduk::class,
            'jenis_produk_id'
        );
    }
}