@extends('layouts.admin')

@section('title', 'Edit Informasi - Admin')
@section('page-title', 'Edit Informasi')
@section('page-subtitle', 'Perbarui informasi yang sudah ada')

@section('content')
    <div class="card" style="max-width: 800px;">
        <div class="card-header">
            <h3><i class="fas fa-edit" style="margin-right: 8px; color: var(--warning);"></i> Form Edit Informasi</h3>
            <a href="{{ route('admin.informasi.index') }}" class="btn btn-outline btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.informasi.update', $informasi) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="judul">Judul Informasi <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="judul" name="judul" class="form-control"
                           value="{{ old('judul', $informasi->judul) }}" placeholder="Masukkan judul informasi" required>
                    @error('judul')
                        <small style="color: #ef4444; margin-top: 4px; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori <span style="color: #ef4444;">*</span></label>
                    <select id="kategori" name="kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Pengumuman" {{ old('kategori', $informasi->kategori) == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                        <option value="Akademik" {{ old('kategori', $informasi->kategori) == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="Kegiatan" {{ old('kategori', $informasi->kategori) == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="Umum" {{ old('kategori', $informasi->kategori) == 'Umum' ? 'selected' : '' }}>Umum</option>
                    </select>
                    @error('kategori')
                        <small style="color: #ef4444; margin-top: 4px; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="isi">Isi Informasi <span style="color: #ef4444;">*</span></label>
                    <textarea id="isi" name="isi" class="form-control"
                              placeholder="Tuliskan isi informasi secara lengkap" required>{{ old('isi', $informasi->isi) }}</textarea>
                    @error('isi')
                        <small style="color: #ef4444; margin-top: 4px; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <div style="display: flex; gap: 12px; justify-content: flex-end;">
                    <a href="{{ route('admin.informasi.index') }}" class="btn btn-outline">Batal</a>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Perbarui Informasi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
