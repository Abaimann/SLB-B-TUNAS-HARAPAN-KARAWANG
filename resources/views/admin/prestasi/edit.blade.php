@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-semibold mb-4">{{ $title }}</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Prestasi</label>
                    <input type="text" name="nama_prestasi" value="{{ $prestasi->nama_prestasi }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Akademik" {{ $prestasi->kategori == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="Non Akademik" {{ $prestasi->kategori == 'Non Akademik' ? 'selected' : '' }}>Non Akademik</option>
                        <option value="Karya" {{ $prestasi->kategori == 'Karya' ? 'selected' : '' }}>Karya</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tingkat</label>
                    <input type="text" name="tingkat" value="{{ $prestasi->tingkat }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ $prestasi->tanggal }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea id="summernote" name="deskripsi" class="form-control" rows="4">{{ $prestasi->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Foto Galeri</label>
                    <select name="galeri_id" class="form-control">
                        <option value="">-- Pilih Foto --</option>
                        @foreach ($galeris as $galeri)
                            <option value="{{ $galeri->id }}"
                                {{ $prestasi->galeri_id == $galeri->id ? 'selected' : '' }}>
                                {{ $galeri->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('admin.prestasi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
