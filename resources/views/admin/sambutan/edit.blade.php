@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="fw-semibold mb-3">Edit Sambutan</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.sambutan.update', $sambutan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama Kepala Sekolah</label>
                    <select name="kepala_guru_id" class="form-control">
                        <option value="">- Pilih -</option>
                        @foreach($gurus as $g)
                            <option value="{{ $g->id }}" {{ $sambutan->kepala_guru_id == $g->id ? 'selected' : '' }}>
                                {{ $g->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Foto Kepala Sekolah</label>
                    <select name="foto_kepala_id" class="form-control">
                        <option value="">- Pilih -</option>
                        @foreach($gurus as $g)
                            <option value="{{ $g->id }}" {{ $sambutan->foto_kepala_id == $g->id ? 'selected' : '' }}>
                                {{ $g->nama }}
                            </option>
                        @endforeach
                    </select>
                    @if ($sambutan->fotoKepala && $sambutan->fotoKepala->foto)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $sambutan->fotoKepala->foto) }}" width="120" class="rounded">
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label>Sambutan</label>
                    <textarea id="summernote" name="sambutan_kepala" class="form-control" rows="6">{{ $sambutan->sambutan_kepala }}</textarea>
                </div>

                <div class="text-end">
                    <a href="{{ route('admin.sambutan.index') }}" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
