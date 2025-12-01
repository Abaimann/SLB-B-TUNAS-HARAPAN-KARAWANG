<?php

namespace App\Exports;

use App\Models\Ppdb;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PpdbExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Ppdb::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'nama_lengkap',
            'nama_panggilan',
            'tempat_tanggal_lahir',
            'jenis_kelamin',
            'agama',
            'no_hp',
            'alamat_rumah',
            'asal_sekolah',
            'alamat_sekolah',
            'nama_ayah',
            'telepon_ayah',
            'pekerjaan_ayah',
            'alamat_ayah',
            'nama_ibu',
            'telepon_ibu',
            'pekerjaan_ibu',
            'alamat_ibu',
            'nama_wali',
            'telepon_wali',
            'alamat_wali',
            'created_at',
            'updated_at'
        ];
    }
}
