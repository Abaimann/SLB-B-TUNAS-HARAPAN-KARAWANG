@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="bg-white p-4 rounded shadow-sm">

        <a href="{{ route('admin.ppdb.index') }}" class="btn btn-secondary mb-3">
            Kembali
        </a>

        <h4 class="fw-bold mb-3">Detail Pendaftar PPDB</h4>
        <hr>

        <div class="row">
            <div class="col-md-12">

                <table class="table table-borderless">

                    <tr>
                        <th width="35%">Nama Lengkap</th>
                        <td>: {{ $data->nama_lengkap }}</td>
                    </tr>

                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>: {{ $data->jenis_kelamin }}</td>
                    </tr>

                    <tr>
                        <th>No HP</th>
                        <td>: {{ $data->no_hp }}</td>
                    </tr>

                    <tr>
                        <th>Nama Ayah</th>
                        <td>: {{ $data->nama_ayah }}</td>
                    </tr>

                    <tr>
                        <th>Alamat Ayah</th>
                        <td>: {{ $data->alamat_ayah }}</td>
                    </tr>

                    <tr>
                        <th>Nama Ibu</th>
                        <td>: {{ $data->nama_ibu }}</td>
                    </tr>

                    <tr>
                        <th>Alamat Ibu</th>
                        <td>: {{ $data->alamat_ibu }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Daftar</th>
                        <td>: {{ $data->created_at->format('d M Y - H:i') }}</td>
                    </tr>

                </table>

            </div>
        </div>

    </div>

</div>
@endsection
