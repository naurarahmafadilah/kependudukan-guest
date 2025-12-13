<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $searchable = ['name', 'email'];
        $filterable = ['role'];

        $user = User::search($request, $searchable)
            ->filter($request, $filterable)
            ->latest()
            ->paginate(12);

        return view('guest.user.index', compact('user'));
    }

    public function create()
    {
        return view('guest.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'role'     => 'required|in:admin,guest',
            'password' => 'required|min:8|confirmed',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        // ✅ SIMPAN FOTO JIKA ADA
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('user', 'public');
        }

        User::create($data);

        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('guest.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required|in:admin,guest',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'min:8|confirmed';
        }

        $request->validate($rules);

        $data = $request->all();

        // ✅ UPDATE PASSWORD JIKA DIISI
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        // ✅ UPDATE FOTO JIKA ADA
        if ($request->hasFile('foto')) {
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            $data['foto'] = $request->file('foto')->store('user', 'public');
        }

        $user->update($data);

        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // ✅ HAPUS FOTO DARI STORAGE
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }

        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil dihapus!');
    }
}
