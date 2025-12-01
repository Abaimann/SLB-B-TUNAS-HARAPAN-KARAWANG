@extends('layouts-public.all')

@section('title', 'Form PPDB')

@section('content')

<div class="container py-5" style="max-width: 900px;">

    {{-- ALERT ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ada data yang belum lengkap!</strong>  
            Silakan periksa kembali form yang ditandai warna merah.
        </div>
    @endif

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success">
            ✓ {{ session('success') }}
        </div>
    @endif

    {{-- FORM START --}}
    <form action="{{ route('user.ppdb.store') }}" method="POST">
        @csrf

        {{-- DATA PRIBADI --}}
        <div class="ppdb-form-card">
            <div class="ppdb-section-title">
                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png" alt="icon">
                Data Pribadi Calon Peserta Didik
            </div>

            <div class="row">

                {{-- NAMA LENGKAP --}}
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text"
                        name="nama_lengkap"
                        class="form-control @error('nama_lengkap') is-invalid @enderror"
                        value="{{ old('nama_lengkap') }}">
                    @error('nama_lengkap')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- NAMA PANGGILAN --}}
                <div class="form-group">
                    <label class="form-label">Nama Panggilan</label>
                    <input type="text"
                        name="nama_panggilan"
                        class="form-control @error('nama_panggilan') is-invalid @enderror"
                        value="{{ old('nama_panggilan') }}">
                    @error('nama_panggilan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TTL --}}
                <div class="form-group">
                    <label class="form-label">Tempat, Tanggal Lahir</label>
                    <input type="text"
                        name="tempat_tanggal_lahir"
                        class="form-control @error('tempat_tanggal_lahir') is-invalid @enderror"
                        value="{{ old('tempat_tanggal_lahir') }}">
                    @error('tempat_tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- JK --}}
                <div class="form-group">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin"
                        class="form-select @error('jenis_kelamin') is-invalid @enderror">
                        <option value="">Pilih jenis kelamin</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- AGAMA --}}
                <div class="form-group">
                    <label class="form-label">Agama</label>
                    <select name="agama"
                        class="form-select @error('agama') is-invalid @enderror">
                        <option value="">Pilih agama</option>
                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                    @error('agama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- NO HP --}}
                <div class="form-group">
                    <label class="form-label">No. HP / WA</label>
                    <input type="text"
                        name="no_hp"
                        class="form-control @error('no_hp') is-invalid @enderror"
                        value="{{ old('no_hp') }}">
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ALAMAT --}}
                <div class="form-group col-full">
                    <label class="form-label">Alamat Rumah</label>
                    <textarea name="alamat_rumah"
                        class="form-control @error('alamat_rumah') is-invalid @enderror">{{ old('alamat_rumah') }}</textarea>
                    @error('alamat_rumah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>

        {{-- DATA PENDIDIKAN --}}
        <div class="ppdb-form-card">
            <div class="ppdb-section-title">
                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828919.png" alt="icon">
                Data Pendidikan Sebelumnya
            </div>

            <div class="row">

                <div class="form-group">
                    <label class="form-label">Asal Sekolah</label>
                    <input type="text"
                        name="asal_sekolah"
                        class="form-control @error('asal_sekolah') is-invalid @enderror"
                        value="{{ old('asal_sekolah') }}">
                    @error('asal_sekolah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Alamat Sekolah</label>
                    <input type="text"
                        name="alamat_sekolah"
                        class="form-control @error('alamat_sekolah') is-invalid @enderror"
                        value="{{ old('alamat_sekolah') }}">
                    @error('alamat_sekolah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>

        {{-- AYAH --}}
        <div class="ppdb-form-card">
            <div class="ppdb-section-title">
                <img src="https://cdn-icons-png.flaticon.com/512/456/456212.png" alt="icon">
                Data Orang Tua (Ayah)
            </div>

            <div class="row">

                <div class="form-group">
                    <label class="form-label">Nama Ayah</label>
                    <input type="text"
                        name="nama_ayah"
                        class="form-control @error('nama_ayah') is-invalid @enderror"
                        value="{{ old('nama_ayah') }}">
                    @error('nama_ayah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Nomor Telepon Ayah</label>
                    <input type="text"
                        name="telepon_ayah"
                        class="form-control @error('telepon_ayah') is-invalid @enderror"
                        value="{{ old('telepon_ayah') }}">
                    @error('telepon_ayah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Pekerjaan Ayah</label>
                    <input type="text"
                        name="pekerjaan_ayah"
                        class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                        value="{{ old('pekerjaan_ayah') }}">
                    @error('pekerjaan_ayah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-full">
                    <label class="form-label">Alamat Ayah</label>
                    <textarea name="alamat_ayah"
                        class="form-control @error('alamat_ayah') is-invalid @enderror">{{ old('alamat_ayah') }}</textarea>
                    @error('alamat_ayah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>


        {{-- IBU --}}
        <div class="ppdb-form-card">
            <div class="ppdb-section-title">
                <img src="https://cdn-icons-png.flaticon.com/512/456/456212.png" alt="icon">
                Data Orang Tua (Ibu)
            </div>

            <div class="row">

                <div class="form-group">
                    <label class="form-label">Nama Ibu</label>
                    <input type="text"
                        name="nama_ibu"
                        class="form-control @error('nama_ibu') is-invalid @enderror"
                        value="{{ old('nama_ibu') }}">
                    @error('nama_ibu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Nomor Telepon Ibu</label>
                    <input type="text"
                        name="telepon_ibu"
                        class="form-control @error('telepon_ibu') is-invalid @enderror"
                        value="{{ old('telepon_ibu') }}">
                    @error('telepon_ibu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Pekerjaan Ibu</label>
                    <input type="text"
                        name="pekerjaan_ibu"
                        class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                        value="{{ old('pekerjaan_ibu') }}">
                    @error('pekerjaan_ibu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-full">
                    <label class="form-label">Alamat Ibu</label>
                    <textarea name="alamat_ibu"
                        class="form-control @error('alamat_ibu') is-invalid @enderror">{{ old('alamat_ibu') }}</textarea>
                    @error('alamat_ibu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>

        {{-- WALI (OPSIONAL, TIDAK WAJIB) --}}
        <div class="ppdb-form-card">
            <div class="ppdb-section-title">
                <img src="https://cdn-icons-png.flaticon.com/512/747/747376.png" alt="icon">
                Data Wali (Opsional)
            </div>

            <div class="row">

                <div class="form-group">
                    <label class="form-label">Nama Wali</label>
                    <input type="text"
                        name="nama_wali"
                        class="form-control"
                        value="{{ old('nama_wali') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Nomor Telepon Wali</label>
                    <input type="text"
                        name="telepon_wali"
                        class="form-control"
                        value="{{ old('telepon_wali') }}">
                </div>

                <div class="form-group col-full">
                    <label class="form-label">Alamat Wali</label>
                    <textarea name="alamat_wali"
                        class="form-control">{{ old('alamat_wali') }}</textarea>
                </div>

            </div>
        </div>

        {{-- PERNYATAAN --}}
        <div class="ppdb-form-card">
            <div class="ppdb-section-title">
                <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" alt="icon">
                Pernyataan Calon Peserta Didik
            </div>

            <div class="ppdb-statement-box">
                <p><strong>Saya menyatakan kebenaran data diri orang tua dan menyatakan bahwa:</strong></p>

                <p>Saya bersedia mengikuti tes potensi diri pada tanggal
                    <strong>11 November 2025</strong> dengan membawa persyaratan berikut:
                </p>

                <ul>
                    <li>Fotokopi Kartu Keluarga</li>
                    <li>Fotokopi Akta Kelahiran</li>
                    <li>Fotokopi rapor kelas 4 & 5</li>
                    <li>Pas foto 3x4 (2 lembar)</li>
                    <li>Surat keterangan khusus (bila diperlukan)</li>
                </ul>

                <p><strong>Dengan mengirimkan formulir ini, saya menyetujui semua ketentuan yang berlaku.</strong></p>
            </div>
        </div>

        {{-- BUTTON --}}
        <div class="text-center my-4">
            <button class="ppdb-btn-submit" type="submit">
                ✓ Submit Pendaftaran
            </button>
        </div>

    </form>
    {{-- FORM END --}}

</div>

@endsection
