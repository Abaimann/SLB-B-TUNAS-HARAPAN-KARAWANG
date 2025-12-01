@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="fw-semibold mb-3">Edit Slide #{{ $slide->order }}</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.hero.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input name="title" class="form-control" value="{{ old('title', $slide->title) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input name="subtitle" class="form-control" value="{{ old('subtitle', $slide->subtitle) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Slide</label><br>
                    @if ($slide->image)
                        <img src="{{ asset('storage/' . $slide->image) }}" width="300" class="mb-2" style="object-fit:cover"><br>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="text-end">
                    <a href="{{ route('admin.hero.index') }}" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
