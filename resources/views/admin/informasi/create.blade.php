@extends('layouts.admin')

@section('title', 'Tambah Informasi - Admin')
@section('page-title', 'Tambah Informasi')
@section('page-subtitle', 'Buat informasi baru untuk ditampilkan kepada pengguna')

@section('content')
    <div class="card" style="max-width: 800px;">
        <div class="card-header">
            <h3><i class="fas fa-plus-circle" style="margin-right: 8px; color: var(--success);"></i> Form Tambah Informasi</h3>
            <a href="{{ route('admin.informasi.index') }}" class="btn btn-outline btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.informasi.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="judul">Judul Informasi <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="judul" name="judul" class="form-control"
                           value="{{ old('judul') }}" placeholder="Masukkan judul informasi" required>
                    @error('judul')
                        <small style="color: #ef4444; margin-top: 4px; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori <span style="color: #ef4444;">*</span></label>
                    <select id="kategori" name="kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Pengumuman" {{ old('kategori') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                        <option value="Akademik" {{ old('kategori') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="Kegiatan" {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="Umum" {{ old('kategori') == 'Umum' ? 'selected' : '' }}>Umum</option>
                    </select>
                    @error('kategori')
                        <small style="color: #ef4444; margin-top: 4px; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="isi">Isi Informasi <span style="color: #ef4444;">*</span></label>
                    <textarea id="isi" name="isi" class="form-control"
                              placeholder="Tuliskan isi informasi secara lengkap" required>{{ old('isi') }}</textarea>
                    @error('isi')
                        <small style="color: #ef4444; margin-top: 4px; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <div style="display: flex; gap: 12px; justify-content: flex-end;">
                    <a href="{{ route('admin.informasi.index') }}" class="btn btn-outline">Batal</a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan Informasi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
