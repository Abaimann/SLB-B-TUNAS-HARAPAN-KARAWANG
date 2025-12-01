@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-semibold">{{ $title }}</h4>
        <a href="{{ route('admin.guru.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Guru
        </a>
    </div>

    {{-- ALERT --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- SEARCH BAR --}}
    <form action="{{ route('admin.guru.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" 
                   name="search" 
                   class="form-control" 
                   placeholder="Cari guru berdasarkan nama..."
                   value="{{ $search ?? '' }}">
            <button class="btn btn-primary">Cari</button>
        </div>
    </form>

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Mapel</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Keterangan</th>
                        <th>Foto</th>
                        <th class="text-center" style="width: 180px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($gurus as $guru)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $guru->nama }}</td>
                            <td>{{ $guru->mapel }}</td>
                            <td>{{ $guru->email }}</td>
                            <td>{{ $guru->no_hp ?? '-' }}</td>
                            <td>{{ $guru->keterangan ?? '-' }}</td>
                            <td class="text-center">
                                @if ($guru->foto)
                                    <img src="{{ asset('storage/' . $guru->foto) }}" width="50" class="rounded">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.guru.edit', $guru->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                            <td colspan="8" class="text-center text-muted">Belum ada data guru</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
