<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // LIST ADMIN
    public function index()
    {
        $admins = User::where('role', 'admin')->paginate(10);
        return view('admin.users.index', compact('admins'));
    }

    // FORM TAMBAH ADMIN
    public function create()
    {
        return view('admin.users.create');
    }

    // SIMPAN ADMIN BARU
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'admin',
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Admin berhasil ditambahkan!');
    }

    // FORM EDIT ADMIN
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.users.edit', compact('admin'));
    }

    // UPDATE ADMIN
    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $admin->id,
            'password'  => 'nullable|string|min:6|confirmed',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.users.index')->with('success', 'Admin berhasil diperbarui!');
    }

    // HAPUS ADMIN
    public function destroy($id)
    {
        User::where('role', 'admin')->findOrFail($id)->delete();

        return redirect()->route('admin.users.index')->with('success', 'Admin berhasil dihapus!');
    }
}
