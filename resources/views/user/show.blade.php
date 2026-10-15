@extends('layouts.user')

@section('title', $informasi->judul . ' - Informasi Sekolah')

@section('content')
    <div class="detail-container fade-in-up">
        {{-- Tombol kembali --}}
        <a href="{{ route('user.beranda') }}" class="detail-back">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
        </a>

        {{-- Artikel detail --}}
        <article class="detail-article">
            <span class="badge">{{ $informasi->kategori }}</span>

            <h1>{{ $informasi->judul }}</h1>

            <div class="meta">
                <div class="meta-item">
                    <i class="fas fa-user"></i>
                    <span>{{ $informasi->user->name ?? 'Admin' }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>{{ $informasi->created_at->format('d F Y') }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-clock"></i>
                    <span>{{ $informasi->created_at->format('H:i') }} WIB</span>
                </div>
            </div>

            <div class="content">
                {!! nl2br(e($informasi->isi)) !!}
            </div>
        </article>
    </div>

    {{-- Informasi Lainnya --}}
    @if($informasiLain->count() > 0)
        <div class="related-section">
            <h3>Informasi Lainnya</h3>
            <div class="related-grid">
                @foreach($informasiLain as $item)
                    <a href="{{ route('user.informasi.show', $item) }}" class="related-card">
                        <h4>{{ $item->judul }}</h4>
                        <span><i class="fas fa-calendar-alt"></i> {{ $item->created_at->format('d M Y') }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
@endsection
