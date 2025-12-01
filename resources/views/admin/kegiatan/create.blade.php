@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="fw-semibold mb-3">{{ $title }}</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="judul_kegiatan" class="form-label">Judul Kegiatan</label>
                    <input type="text" name="judul_kegiatan" class="form-control" value="{{ old('judul_kegiatan') }}" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea id="summernote" name="deskripsi" rows="4" class="form-control" required>{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Foto dari Galeri</label>
                    <select name="galeri_id" class="form-control">
                        <option value="">-- Tanpa Foto --</option>
                        @foreach ($galeris as $galeri)
                            <option value="{{ $galeri->id }}">{{ $galeri->judul }}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
