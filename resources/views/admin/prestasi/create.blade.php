@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-semibold mb-4">{{ $title }}</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Prestasi</label>
                    <input type="text" name="nama_prestasi" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Akademik">Akademik</option>
                        <option value="Non Akademik">Non Akademik</option>
                        <option value="Karya">Karya</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tingkat</label>
                    <input type="text" name="tingkat" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" 
                        value="{{ date('Y-m-d') }}" required> {{-- otomatis hari ini --}}
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea id="summernote" name="deskripsi" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Foto Galeri</label>
                    <select name="galeri_id" class="form-control">
                        <option value="">-- Pilih Foto --</option>
                        @foreach ($galeris as $galeri)
                            <option value="{{ $galeri->id }}">{{ $galeri->judul }}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.prestasi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
