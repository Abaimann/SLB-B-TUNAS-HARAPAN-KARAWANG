@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container-fluid px-4">
    <h1 class="h3 mb-4">{{ $title }}</h1>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul Galeri</label>
                    <input type="text" name="judul"
                           class="form-control @error('judul') is-invalid @enderror"
                           value="{{ old('judul') }}" placeholder="Masukkan judul galeri">
                    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">File Foto / Video</label>
                    <input type="file" name="gambar" id="gambar"
                           class="form-control @error('gambar') is-invalid @enderror"
                           accept="image/*,video/*" onchange="previewMedia(event)">
                    @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror

                    <div class="mt-3">
                        <img id="previewImage" class="d-none img-thumbnail rounded" style="max-width: 200px;">
                        <video id="previewVideo" class="d-none rounded" style="max-width: 200px;" controls></video>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              placeholder="Masukkan deskripsi (opsional)">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<script>
function previewMedia(event) {
    const file = event.target.files[0];
    if (!file) return;

    const previewImage = document.getElementById('previewImage');
    const previewVideo = document.getElementById('previewVideo');

    previewImage.classList.add('d-none');
    previewVideo.classList.add('d-none');

    const url = URL.createObjectURL(file);

    if (file.type.startsWith('image/')) {
        previewImage.src = url;
        previewImage.classList.remove('d-none');
    } else if (file.type.startsWith('video/')) {
        previewVideo.src = url;
        previewVideo.classList.remove('d-none');
    }
}
</script>
@endsection
