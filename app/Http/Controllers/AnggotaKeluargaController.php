<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\KeluargaKk;
use App\Models\Warga;
use Illuminate\Http\Request;

class AnggotaKeluargaController extends Controller
{
    public function index(Request $request)
    {
        //kolom yang bisa di-filter (langsung dari tabel anggota_keluarga)
        $filterableColumns = ['hubungan'];

        // kolom di tabel anggota_keluarga yang mau dipakai untuk search langsung
        $searchableColumns = ['hubungan'];

        $anggota = AnggotaKeluarga::with(['keluarga','warga'])
        ->filter($request, $filterableColumns)   // scopeFilter di model
            ->search($request, $searchableColumns)   // scopeSearch di model
            ->latest('anggota_id')
            ->paginate(15);
            
        return view('guest.anggota.index', compact('anggota'));
    }

    public function create()
    {
        $keluargas = KeluargaKk::orderBy('kk_nomor')->get();
        $wargas = Warga::orderBy('warga_id')->get();
        return view('guest.anggota.create', compact('keluargas','wargas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kk_id' => 'required|exists:keluarga_kk,kk_id',
            'warga_id' => 'nullable|integer',
            'hubungan' => 'nullable|string|max:100',
        ]);

        AnggotaKeluarga::create($data);

        return redirect()->route('anggota-keluarga.index')->with('success','Anggota keluarga berhasil ditambahkan');
    }

    public function show(AnggotaKeluarga $anggotaKeluarga)
    {
        $anggotaKeluarga->load(['keluarga','warga']);
        return view('guest.anggota.show', ['anggota'=>$anggotaKeluarga]);
    }

    public function edit(AnggotaKeluarga $anggotaKeluarga)
    {
        $keluargas = KeluargaKk::orderBy('kk_nomor')->get();
        $wargas = Warga::orderBy('warga_id')->get();
        return view('guest.anggota.edit', ['anggota'=>$anggotaKeluarga,'keluargas'=>$keluargas,'wargas'=>$wargas]);
    }

    public function update(Request $request, AnggotaKeluarga $anggotaKeluarga)
    {
        $data = $request->validate([
            'kk_id' => 'required|exists:keluarga_kk,kk_id',
            'warga_id' => 'nullable|integer',
            'hubungan' => 'nullable|string|max:100',
        ]);

        $anggotaKeluarga->update($data);
        return redirect()->route('anggota-keluarga.index')->with('success','Data anggota berhasil diperbarui');
    }

    public function destroy(AnggotaKeluarga $anggotaKeluarga)
    {
        $anggotaKeluarga->delete();
        return redirect()->route('anggota-keluarga.index')->with('success','Anggota berhasil dihapus');
    }
}
