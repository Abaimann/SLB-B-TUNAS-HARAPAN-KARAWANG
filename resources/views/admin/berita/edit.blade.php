@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container-fluid px-4">
    <h1 class="h3 mb-4">{{ $title }}</h1>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Judul Berita</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $berita->judul) }}">
                    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Konten</label>
                    <textarea id="summernote" name="konten" class="form-control">{{ old('konten', $berita->konten) }}</textarea>
                    @error('konten') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Gambar dari Galeri</label>
                    <select name="galeri_id" class="form-control">
                        <option value="">— Tanpa Gambar —</option>
                        @foreach ($galeris as $galeri)
                            <option value="{{ $galeri->id }}" 
                                {{ $berita->galeri_id == $galeri->id ? 'selected' : '' }}>
                                {{ $galeri->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @if ($berita->galeri)
                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini</label><br>
                        <img src="{{ asset('storage/' . $berita->galeri->gambar) }}" class="img-thumbnail" width="180">
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
