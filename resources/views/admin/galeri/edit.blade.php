@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container-fluid px-4">
    <h1 class="h3 mb-4">{{ $title }}</h1>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Judul Galeri</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $galeri->judul) }}">
                    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar</label><br>
                    @if($galeri->gambar)
                        <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="Gambar Galeri" id="currentImage" class="img-thumbnail mb-2 rounded" width="150">
                    @endif
                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" onchange="previewImage(event)">
                    @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <div class="mt-3">
                        <img id="preview" src="#" alt="Preview Gambar Baru" class="d-none img-thumbnail rounded" style="max-width: 200px;">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                    @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

{{-- Preview Gambar --}}
<script>
function previewImage(event) {
    const reader = new FileReader();
    const preview = document.getElementById('preview');
    const current = document.getElementById('currentImage');
    reader.onload = function() {
        preview.src = reader.result;
        preview.classList.remove('d-none');
        if (current) current.style.opacity = '0.4'; // supaya terlihat diganti
    }
    if (event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
}
</script>
@endsection
