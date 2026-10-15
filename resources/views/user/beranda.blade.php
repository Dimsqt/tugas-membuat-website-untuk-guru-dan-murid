@extends('layouts.user')

@section('title', 'Beranda - Informasi Sekolah')

@section('content')
    {{-- Hero Section --}}
    <div class="hero">
        <h2>📢 Informasi Sekolah</h2>
        <p>Temukan informasi terbaru seputar kegiatan, pengumuman, dan berita akademik sekolah</p>
    </div>

    <div class="content-wrapper">
        {{-- Daftar Informasi --}}
        @if($informasis->count() > 0)
            <div class="info-grid">
                @foreach($informasis as $index => $info)
                    <div class="info-card fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                        <div class="info-card-body">
                            <span class="info-card-badge">{{ $info->kategori }}</span>
                            <h3>{{ $info->judul }}</h3>
                            <p>{{ Str::limit($info->isi, 120) }}</p>
                        </div>
                        <div class="info-card-footer">
                            <div class="info-card-meta">
                                <i class="fas fa-calendar-alt"></i>
                                <span>{{ $info->created_at->format('d M Y') }}</span>
                            </div>
                            <a href="{{ route('user.informasi.show', $info) }}" class="info-card-link">
                                Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($informasis->hasPages())
                <div class="pagination-wrapper">
                    {{ $informasis->links('pagination.custom') }}
                </div>
            @endif
        @else
            <div class="empty-state">
                <i class="fas fa-info-circle"></i>
                <h3>Belum Ada Informasi</h3>
                <p>Informasi terbaru dari sekolah akan muncul di sini.</p>
            </div>
        @endif
    </div>
@endsection
