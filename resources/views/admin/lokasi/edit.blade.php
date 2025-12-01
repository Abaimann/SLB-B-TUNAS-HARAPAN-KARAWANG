@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-semibold mb-4">{{ $title }}</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.lokasi.update', $lokasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" value="{{ $lokasi->nama_sekolah }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Singkat</label>
                    <textarea id="summernote" name="deskripsi_singkat" class="form-control" rows="3">{{ $lokasi->deskripsi_singkat }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ $lokasi->alamat }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="nomor_telpon" value="{{ $lokasi->nomor_telpon }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $lokasi->email }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Google Maps Embed</label>
                    <textarea name="gmaps_embed" class="form-control" rows="2">{{ $lokasi->gmaps_embed }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Logo Sekolah (opsional)</label><br>
                    @if ($lokasi->logo)
                        <img src="{{ asset('storage/' . $lokasi->logo) }}" width="100" class="mb-2 rounded">
                    @endif
                    <input type="file" name="logo" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('admin.lokasi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
