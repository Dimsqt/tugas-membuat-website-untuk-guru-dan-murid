@extends('layouts.admin')

@section('title', 'Dashboard - Admin')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan data dan informasi terbaru')

@section('content')
    {{-- Statistik Cards --}}
    <div class="stats-grid">
        <div class="stat-card primary">
            <div class="stat-icon primary">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $totalInformasi }}</h3>
                <p>Total Informasi</p>
            </div>
        </div>

        <div class="stat-card success">
            <div class="stat-icon success">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $totalUser }}</h3>
                <p>Total User</p>
            </div>
        </div>

        <div class="stat-card info">
            <div class="stat-icon info">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $totalAdmin }}</h3>
                <p>Total Admin</p>
            </div>
        </div>
    </div>

    {{-- Tabel Informasi Terbaru --}}
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-clock" style="margin-right: 8px; color: var(--primary);"></i> Informasi Terbaru</h3>
            <a href="{{ route('admin.informasi.index') }}" class="btn btn-outline btn-sm">
                Lihat Semua <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="card-body" style="padding: 0;">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Dibuat Oleh</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($informasiTerbaru as $index => $info)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td style="color: var(--text-primary); font-weight: 500;">
                                    {{ Str::limit($info->judul, 50) }}
                                </td>
                                <td>
                                    <span class="badge badge-primary">{{ $info->kategori }}</span>
                                </td>
                                <td>{{ $info->user->name ?? '-' }}</td>
                                <td>{{ $info->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 40px; color: var(--text-muted);">
                                    <i class="fas fa-inbox" style="font-size: 32px; display: block; margin-bottom: 8px;"></i>
                                    Belum ada informasi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
