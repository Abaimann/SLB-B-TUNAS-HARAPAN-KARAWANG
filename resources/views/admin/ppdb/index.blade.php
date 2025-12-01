@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="bg-white p-4 rounded shadow-sm">
        <h4 class="fw-bold mb-3">Data Pendaftar PPDB</h4>
        <hr>

        {{-- SEARCH BAR --}}
        <form action="{{ route('admin.ppdb.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control"
                    placeholder="Cari nama pendaftar..."
                    value="{{ $search ?? '' }}"
                >
                <button class="btn btn-primary">Cari</button>
            </div>
        </form>

        {{-- Jika ada data --}}
        @if ($ppdbData->count() > 0)
        <div class="d-flex justify-content-between mb-3">

            {{-- Tombol Export --}}
            <a href="{{ route('admin.ppdb.export') }}" class="btn btn-success">
                Export Excel
            </a>

            {{-- Tombol Hapus Semua --}}
            <form action="{{ route('admin.ppdb.deleteAll') }}" 
                  method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus SEMUA data PPDB?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">
                    Hapus Semua Data
                </button>
            </form>

        </div>
        @endif

        {{-- Jika tidak ada data --}}
        @if ($ppdbData->count() == 0)
            <p class="text-muted">Belum ada pendaftar.</p>
        @else

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>No HP</th>
                            <th>Tanggal Daftar</th>
                            <th style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($ppdbData as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>

                            <td class="d-flex gap-2">

                                {{-- Detail --}}
                                <a href="{{ route('admin.ppdb.show', $item->id) }}" 
                                   class="btn btn-sm btn-primary">
                                    Detail
                                </a>

                                {{-- Hapus --}}
                                <form action="{{ route('admin.ppdb.delete', $item->id) }}" 
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        @endif

    </div>

</div>
@endsection
