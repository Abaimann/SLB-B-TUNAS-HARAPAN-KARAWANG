@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-semibold">{{ $title }}</h4>
        <a href="{{ route('admin.lokasi.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Lokasi
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
                        <th>Nama Sekolah</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Email</th> {{-- Tambahan --}}
                        <th>Logo</th>
                        <th class="text-center" style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lokasis as $lokasi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $lokasi->nama_sekolah }}</td>
                            <td>{{ Str::limit($lokasi->alamat, 50) }}</td>
                            <td>{{ $lokasi->nomor_telpon }}</td>
                            <td>{{ $lokasi->email ?? '-' }}</td> {{-- Tambahan --}}
                            <td>
                                @if ($lokasi->logo)
                                    <img src="{{ asset('storage/' . $lokasi->logo) }}" width="70" class="rounded">
                                @else
                                    <small class="text-muted">-</small>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.lokasi.edit', $lokasi->id) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.lokasi.destroy', $lokasi->id) }}" method="POST" class="d-inline">
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
                            <td colspan="7" class="text-center text-muted">Belum ada data lokasi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
