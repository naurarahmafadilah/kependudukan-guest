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

        $anggota = AnggotaKeluarga::with(['keluarga','warga'])->latest('anggota_id');
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

        $keluargaList = KeluargaKk::orderBy('kk_nomor')->get();

        // kolom untuk filter exact match (sesuai name di form)
        $filterableColumns = ['kk_id', 'hubungan'];

        // kolom untuk pencarian (search) — sesuaikan nama kolom & relasi
        $searchableColumns = ['warga.nama', 'warga.no_ktp', 'hubungan'];

        // base query (eager load relasi)
        $query = AnggotaKeluarga::with(['keluarga', 'warga']);

        // terapkan filter dan search sesuai modul (hanya jika scope ada)
        if (method_exists(AnggotaKeluarga::class, 'scopeFilter')) {
            $query = $query->filter($request, $filterableColumns);
        }
        if (method_exists(AnggotaKeluarga::class, 'scopeSearch')) {
            $query = $query->search($request, $searchableColumns);
        }

        // urut terbaru dulu (sesuai modul)
        $query = $query->orderByDesc('anggota_id');

        // pagination -> sesuai modul: 10 per halaman, pertahankan query string, tampilkan 2 halaman samping
        $anggota = $query->paginate(10)->onEachSide(2);
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
