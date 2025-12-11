<?php

namespace App\Http\Controllers;

use App\Models\KeluargaKk;
use App\Models\Warga;
use Illuminate\Http\Request;

class KeluargaKkController extends Controller
{
    public function index(Request $request)
    {
        $filterableColumns = ['rt', 'rw']; // contoh: filter berdasarkan RT/RW
        // kolom yang akan dicari pada fitur search
        $searchableColumns = ['kk_nomor', 'alamat']; // contoh: search KK nomor atau alamat

        $keluarga = KeluargaKk::with('kepalaKeluarga')
        ->filter($request, $filterableColumns)   // scopeFilter di model
        ->search($request, $searchableColumns)   // scopeSearch di model
        ->latest()
        ->paginate(10);
        
        return view('guest.kependudukan.index', compact('keluarga'));
    }

    public function create()
    {
        $warga = Warga::all();
        return view('guest.kependudukan.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kk_nomor' => 'required|unique:keluarga_kk,kk_nomor',
            'kepala_keluarga_warga_id' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ]);

        KeluargaKk::create($request->all());
        return redirect()->route('kependudukan.index')->with('success', 'Data keluarga berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $keluarga = KeluargaKk::findOrFail($id);
        $warga = Warga::all();
        return view('guest.kependudukan.edit', compact('keluarga', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $keluarga = KeluargaKk::findOrFail($id);
        $request->validate([
            'kk_nomor' => 'required|unique:keluarga_kk,kk_nomor,' . $keluarga->kk_id . ',kk_id',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ]);

        $keluarga->update($request->all());
        return redirect()->route('kependudukan.index')->with('success', 'Data keluarga berhasil diperbarui!');
    }

    public function destroy($id)
    {
        KeluargaKk::findOrFail($id)->delete();
        return redirect()->route('kependudukan.index')->with('success', 'Data keluarga berhasil dihapus!');
    }

    public function show($id)
    {
        $keluarga = KeluargaKk::findOrFail($id);
        return view('guest.kependudukan.show', compact('keluarga'));
    }
}
