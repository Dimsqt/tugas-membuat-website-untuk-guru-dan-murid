@extends('layouts.admin')

@section('title', 'Detail Informasi - Admin')
@section('page-title', 'Detail Informasi')
@section('page-subtitle', 'Melihat detail informasi yang telah dibuat')

@section('content')
    <div class="card" style="max-width: 800px;">
        <div class="card-header">
            <h3><i class="fas fa-eye" style="margin-right: 8px; color: var(--info);"></i> Detail Informasi</h3>
            <a href="{{ route('admin.informasi.index') }}" class="btn btn-outline btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="detail-header">
                <span class="badge badge-primary">{{ $informasi->kategori }}</span>
                <h2 style="font-size: 24px; font-weight: 700; color: var(--text-primary); margin-top: 12px;">
                    {{ $informasi->judul }}
                </h2>
                <div class="detail-meta">
                    <div class="detail-meta-item">
                        <i class="fas fa-user"></i>
                        <span>{{ $informasi->user->name ?? '-' }}</span>
                    </div>
                    <div class="detail-meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>{{ $informasi->created_at->format('d F Y, H:i') }}</span>
                    </div>
                    @if($informasi->updated_at != $informasi->created_at)
                        <div class="detail-meta-item">
                            <i class="fas fa-clock"></i>
                            <span>Diperbarui: {{ $informasi->updated_at->format('d F Y, H:i') }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <div style="border-top: 1px solid var(--border); padding-top: 24px;">
                <div class="detail-content">
                    {!! nl2br(e($informasi->isi)) !!}
                </div>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--border);">
                <a href="{{ route('admin.informasi.edit', $informasi) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit Informasi
                </a>
                <form action="{{ route('admin.informasi.destroy', $informasi) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus informasi ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Hapus Informasi
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
