@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="fw-semibold mb-4">{{ $title }}</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.ekskul.update', $ekskul->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Ekskul</label>
                    <input type="text" name="nama_ekskul" class="form-control" value="{{ old('nama_ekskul', $ekskul->nama_ekskul) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pembina</label>
                    <input type="text" name="pembina" class="form-control" value="{{ old('pembina', $ekskul->pembina) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jadwal</label>
                    <input type="text" name="jadwal" class="form-control" value="{{ old('jadwal', $ekskul->jadwal) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar (opsional)</label>
                    @if ($ekskul->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $ekskul->gambar) }}" alt="Gambar Ekskul" width="100">
                        </div>
                    @endif
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.ekskul.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
