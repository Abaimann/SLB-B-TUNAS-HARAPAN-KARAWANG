@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="fw-semibold mb-3">Kelola Hero Slides</h4>

    <div class="row">
        @foreach($slides as $slide)
        <div class="col-md-4 mb-3">
            <div class="card">
                @if($slide->image)
                    <img src="{{ asset('storage/'.$slide->image) }}" class="card-img-top" style="height:180px;object-fit:cover">
                @else
                    <div style="height:180px;background:#f1f1f1;display:flex;align-items:center;justify-content:center">
                        <small class="text-muted">Belum ada gambar</small>
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $slide->title ?? '—' }}</h5>
                    <p class="card-text small">{{ $slide->subtitle ?? '—' }}</p>
                    <div class="d-flex">
                        <a href="{{ route('admin.hero.edit', $slide->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
