@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="fw-semibold mb-4">{{ $title }}</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.ekskul.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Ekskul</label>
                    <input type="text" name="nama_ekskul" class="form-control" value="{{ old('nama_ekskul') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pembina</label>
                    <input type="text" name="pembina" class="form-control" value="{{ old('pembina') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jadwal</label>
                    <input type="text" name="jadwal" class="form-control" value="{{ old('jadwal') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar (opsional)</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.ekskul.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
