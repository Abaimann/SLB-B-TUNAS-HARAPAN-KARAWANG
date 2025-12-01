@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="fw-semibold mb-3">Buat Sambutan</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.sambutan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama Kepala Sekolah</label>
                    <select name="kepala_guru_id" class="form-control">
                        <option value="">- Pilih -</option>
                        @foreach($gurus as $g)
                            <option value="{{ $g->id }}">{{ $g->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Foto Kepala Sekolah (pilih foto dari guru)</label>
                    <select name="foto_kepala_id" class="form-control">
                        <option value="">- Pilih -</option>
                        @foreach($gurus as $g)
                            <option value="{{ $g->id }}">{{ $g->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Sambutan</label>
                    <textarea id="summernote" name="sambutan_kepala" class="form-control" rows="6"></textarea>
                </div>

                <div class="text-end">
                    <a href="{{ route('admin.sambutan.index') }}" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
