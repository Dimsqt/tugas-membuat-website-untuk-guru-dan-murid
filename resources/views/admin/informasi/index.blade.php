@extends('layouts.admin')

@section('title', 'Kelola Informasi - Admin')
@section('page-title', 'Kelola Informasi')
@section('page-subtitle', 'Daftar semua informasi yang telah dibuat')

@section('content')
    {{-- Header aksi --}}
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
        <p style="color: var(--text-secondary); font-size: 14px;">
            Menampilkan {{ $informasis->total() }} informasi
        </p>
        <a href="{{ route('admin.informasi.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Informasi
        </a>
    </div>

    {{-- Tabel Informasi --}}
    <div class="card">
        <div class="card-body" style="padding: 0;">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Dibuat Oleh</th>
                            <th>Tanggal</th>
                            <th style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($informasis as $index => $info)
                            <tr>
                                <td>{{ $informasis->firstItem() + $index }}</td>
                                <td style="color: var(--text-primary); font-weight: 500;">
                                    {{ Str::limit($info->judul, 45) }}
                                </td>
                                <td>
                                    <span class="badge badge-primary">{{ $info->kategori }}</span>
                                </td>
                                <td>{{ $info->user->name ?? '-' }}</td>
                                <td>{{ $info->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.informasi.show', $info) }}" class="btn btn-info btn-sm" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.informasi.edit', $info) }}" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                                onclick="confirmDelete({{ $info->id }}, '{{ addslashes($info->judul) }}')" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                    <form id="delete-form-{{ $info->id }}"
                                          action="{{ route('admin.informasi.destroy', $info) }}"
                                          method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fas fa-inbox"></i>
                                        <h3>Belum Ada Informasi</h3>
                                        <p>Klik tombol "Tambah Informasi" untuk membuat informasi baru.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    @if($informasis->hasPages())
        <div style="margin-top: 24px;">
            {{ $informasis->links('pagination.custom') }}
        </div>
    @endif

    {{-- Modal Konfirmasi Hapus --}}
    <div class="modal-overlay" id="deleteModal">
        <div class="modal-box">
            <i class="fas fa-exclamation-triangle"></i>
            <h3>Konfirmasi Hapus</h3>
            <p>Apakah Anda yakin ingin menghapus informasi "<span id="deleteTitle"></span>"? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="modal-actions">
                <button class="btn btn-outline" onclick="closeModal()">Batal</button>
                <button class="btn btn-danger" id="confirmDeleteBtn">Ya, Hapus</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    let deleteId = null;

    // menampilkan modal konfirmasi hapus
    function confirmDelete(id, title) {
        deleteId = id;
        document.getElementById('deleteTitle').textContent = title;
        document.getElementById('deleteModal').classList.add('show');
    }

    // menutup modal
    function closeModal() {
        document.getElementById('deleteModal').classList.remove('show');
        deleteId = null;
    }

    // tombol konfirmasi hapus
    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (deleteId) {
            document.getElementById('delete-form-' + deleteId).submit();
        }
    });

    // tutup modal jika klik di luar box
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>
@endsection
