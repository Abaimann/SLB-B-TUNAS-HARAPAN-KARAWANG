@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="fw-semibold mb-3">{{ $title }}</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Guru</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $guru->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mapel</label>
                    <input type="text" name="mapel" class="form-control" value="{{ old('mapel', $guru->mapel) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $guru->email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $guru->no_hp) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $guru->keterangan) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto</label><br>
                    @if ($guru->foto)
                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto" width="80" height="80" class="rounded mb-2">
                    @endif
                    <input type="file" name="foto" class="form-control">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
