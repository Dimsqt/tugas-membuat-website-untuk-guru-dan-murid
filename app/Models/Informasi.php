<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    // nama tabel di database
    protected $table = 'informasis';

    // kolom yang boleh diisi
    protected $fillable = [
        'judul',
        'isi',
        'kategori',
        'user_id',
    ];

    // relasi: informasi dibuat oleh satu user (admin)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
