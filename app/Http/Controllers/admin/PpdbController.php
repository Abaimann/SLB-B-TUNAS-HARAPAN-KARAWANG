<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PpdbExport;
use App\Imports\PpdbImport;

class PpdbController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $ppdbData = Ppdb::when($search, function ($query) use ($search) {
                $query->where('nama_lengkap', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->get();

        return view('admin.ppdb.index', compact('ppdbData', 'search'));
    }

    public function show($id)
    {
        $data = Ppdb::findOrFail($id);
        return view('admin.ppdb.show', compact('data'));
    }

    public function destroy($id)
    {
        Ppdb::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }

    public function destroyAll()
    {
        Ppdb::truncate();
        return back()->with('success', 'Semua data PPDB berhasil dihapus.');
    }

    // EXPORT
    public function export()
    {
        return Excel::download(new PpdbExport, 'data_ppdb.xlsx');
    }

    // IMPORT
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new PpdbImport, $request->file('file'));

        return back()->with('success', 'Data PPDB berhasil diimport!');
    }
}
