<?php

namespace App\Http\Controllers;

use App\Models\Informasi;

class BerandaController extends Controller
{
    // menampilkan halaman beranda user dengan daftar informasi
    public function index()
    {
        $informasis = Informasi::with('user')->latest()->paginate(9);

        return view('user.beranda', compact('informasis'));
    }

    // menampilkan detail informasi untuk user
    public function show(Informasi $informasi)
    {
        $informasi->load('user');

        // mengambil informasi terkait (selain yang sedang dilihat)
        $informasiLain = Informasi::where('id', '!=', $informasi->id)
            ->latest()
            ->take(3)
            ->get();

        return view('user.show', compact('informasi', 'informasiLain'));
    }
}
