<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class JenisProduk extends Model
{
    protected $table = 'jenis_produks';

    protected $fillable = [
        'nama_jenis',
        'user_id',
    ];

    /**
     * Relasi ke user yang menginput jenis produk.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
