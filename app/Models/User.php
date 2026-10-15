<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // kolom yang boleh diisi secara mass-assignment
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // kolom yang disembunyikan saat serialisasi
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // casting tipe data
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // cek apakah user adalah admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // relasi: satu user bisa membuat banyak informasi
    public function informasis()
    {
        return $this->hasMany(Informasi::class);
    }
}
