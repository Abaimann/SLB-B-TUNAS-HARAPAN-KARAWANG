@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="fw-semibold mb-3">Sambutan Kepala Sekolah</h4>

    <div class="card mb-3">
        <div class="card-body">
            @if (!$sambutan)
                <a href="{{ route('admin.sambutan.create') }}" class="btn btn-primary">Buat Sambutan</a>
            @else
                <a href="{{ route('admin.sambutan.edit', $sambutan->id) }}" class="btn btn-warning">Edit Sambutan</a>
            @endif
        </div>
    </div>

    @if ($sambutan)
    <div class="card">
        <div class="card-body">
            <h5>{{ $sambutan->kepalaGuru->nama ?? '-' }}</h5>
            @if ($sambutan->fotoKepala && $sambutan->fotoKepala->foto)
                <img src="{{ asset('storage/' . $sambutan->fotoKepala->foto) }}" width="120" class="rounded mb-2">
            @endif
            <div>{!! nl2br(e($sambutan->sambutan_kepala)) !!}</div>
        </div>
    </div>
    @endif
</div>
@endsection
