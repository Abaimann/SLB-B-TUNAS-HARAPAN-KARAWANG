@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-semibold">{{ $title }}</h4>
        <a href="{{ route('admin.prestasi.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Prestasi
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th> {{-- Tambahan --}}
                        <th>Tingkat</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th class="text-center" style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prestasis as $prestasi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $prestasi->nama_prestasi }}</td>
                            <td>{{ $prestasi->kategori ?? '-' }}</td> {{-- Tambahan --}}
                            <td>{{ $prestasi->tingkat }}</td>
                            <td>{{ \Carbon\Carbon::parse($prestasi->tanggal)->format('d M Y') }}</td>
                            <td>{{ Str::limit($prestasi->deskripsi, 50, '...') }}</td>
                            <td>
                                @if ($prestasi->galeri?->gambar)
                                    <img src="{{ asset('storage/' . $prestasi->galeri->gambar) }}" width="70" class="rounded">
                                @else
                                    <small class="text-muted">-</small>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.prestasi.edit', $prestasi->id) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.prestasi.destroy', $prestasi->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">Belum ada data prestasi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
