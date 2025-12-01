@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-semibold">{{ $title }}</h4>
        <a href="{{ route('admin.ekskul.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Ekskul
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
                        <th>no</th>
                        <th>Nama Ekskul</th>
                        <th>Pembina</th>
                        <th>Jadwal</th>
                        <th>Gambar</th>
                        <th class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ekskuls as $ekskul)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ekskul->nama_ekskul }}</td>
                            <td>{{ $ekskul->pembina }}</td>
                            <td>{{ $ekskul->jadwal ?? '-' }}</td>
                            <td class="text-center">
                                @if ($ekskul->gambar)
                                    <img src="{{ asset('storage/' . $ekskul->gambar) }}" alt="Gambar" width="60">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.ekskul.edit', $ekskul->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.ekskul.destroy', $ekskul->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus ekskul ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data ekskul</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
