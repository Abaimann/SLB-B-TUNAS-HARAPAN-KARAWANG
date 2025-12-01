@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Galeri
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-striped mb-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th width="5%">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Penulis</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galeris as $galeri)
                            <tr>
                                <td class="text-center">{{ $loop->iteration + ($galeris->currentPage() - 1) * $galeris->perPage() }}</td>
                                <td>{{ $galeri->judul }}</td>
                                <td>{{ Str::limit($galeri->deskripsi, 50) }}</td>
                                <td>{{ $galeri->user->name ?? '-' }}</td>
                                <td class="text-center">
                                    
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="btn btn-sm btn-warning me-1">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus galeri ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">Belum ada galeri.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $galeris->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
