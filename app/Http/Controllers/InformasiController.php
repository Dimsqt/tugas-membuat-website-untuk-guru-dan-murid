<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformasiController extends Controller
{
    // menampilkan daftar semua informasi (admin)
    public function index()
    {
        $informasis = Informasi::with('user')->latest()->paginate(10);

        return view('admin.informasi.index', compact('informasis'));
    }

    // menampilkan form tambah informasi
    public function create()
    {
        return view('admin.informasi.create');
    }

    // menyimpan informasi baru ke database
    public function store(Request $request)
    {
        // validasi data input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori' => 'required|string|max:100',
        ]);

        // menambahkan user_id dari admin yang sedang login
        $validated['user_id'] = Auth::id();

        Informasi::create($validated);

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil ditambahkan.');
    }

    // menampilkan detail informasi
    public function show(Informasi $informasi)
    {
        $informasi->load('user');

        return view('admin.informasi.show', compact('informasi'));
    }

    // menampilkan form edit informasi
    public function edit(Informasi $informasi)
    {
        return view('admin.informasi.edit', compact('informasi'));
    }

    // mengupdate informasi di database
    public function update(Request $request, Informasi $informasi)
    {
        // validasi data input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori' => 'required|string|max:100',
        ]);

        $informasi->update($validated);

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil diperbarui.');
    }

    // menghapus informasi dari database
    public function destroy(Informasi $informasi)
    {
        $informasi->delete();

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil dihapus.');
    }
}
