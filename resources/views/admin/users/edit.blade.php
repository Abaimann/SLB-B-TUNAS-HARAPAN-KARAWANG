@extends('layouts.app')

@section('title', 'Edit Admin')

@section('content')
<div class="container-fluid px-4">

    <h1 class="h3 mb-4">Edit Admin</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.users.update', $admin->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" required value="{{ $admin->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required value="{{ $admin->email }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Password Baru (kosongkan jika tidak diganti)
                    </label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <button class="btn btn-warning">Update</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
