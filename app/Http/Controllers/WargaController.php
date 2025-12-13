<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(Request $request)
    {
        $filterableColumns = ['jenis_kelamin', 'agama'];
        $searchableColumns = ['no_ktp', 'nama', 'pekerjaan', 'email'];

        $warga = Warga::filter($request, $filterableColumns)
            ->search($request, $searchableColumns)
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('guest.warga.index', compact('warga'));
    }

    public function create()
    {
        return view('guest.warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp',
            'nama' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        Warga::create($request->all());

        return redirect()
            ->route('warga.index')
            ->with('success', 'Data warga berhasil ditambahkan!');
    }

    /**
     * ===============================
     * SHOW / DETAIL WARGA
     * ===============================
     */
    public function show($id)
    {
        $warga = Warga::with([
            'keluarga.kepalaKeluarga',
            'keluarga.anggota.warga',
            'anggotaKeluarga',
            'kelahiran',
            'kematian',
            'pindah'
        ])->findOrFail($id);

        return view('guest.warga.show', compact('warga'));
    }


    public function edit($id)
    {
        $warga = Warga::findOrFail($id);

        return view('guest.warga.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp,' . $warga->warga_id . ',warga_id',
            'nama' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        $warga->update($request->all());

        return redirect()
            ->route('warga.index')
            ->with('success', 'Data warga berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Warga::findOrFail($id)->delete();

        return redirect()
            ->route('warga.index')
            ->with('success', 'Data warga berhasil dihapus!');
    }
}
