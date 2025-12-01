@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container-fluid px-4">
    <h1 class="h3 mb-4">{{ $title }}</h1>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <form action="{{ route('admin.berita.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul Berita</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Konten</label>
                    <textarea id="summernote" name="konten" class="form-control">{{ old('konten') }}</textarea>
                    @error('konten') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Gambar dari Galeri</label>
                    <select name="galeri_id" class="form-control">
                        <option value="">— Tanpa Gambar —</option>
                        @foreach ($galeris as $galeri)
                            <option value="{{ $galeri->id }}">{{ $galeri->judul }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
