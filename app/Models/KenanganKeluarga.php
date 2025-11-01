<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KenanganKeluarga extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model ini.
     */
    protected $table = 'kenangan_keluarga';

    /**
     * Atribut yang dapat diisi secara massal.
     */
    protected $fillable = [
        'judul',
        'keterangan',
        'tanggal',
        'keluarga',
    ];
}
