<?php

namespace App\Http\Controllers;

use App\Models\PeristiwaKematian;
use App\Models\Warga;
use App\Models\Media;
use Illuminate\Http\Request;

class PeristiwaKematianController extends Controller
{
    public function index(Request $request)
    {
        $kematian = PeristiwaKematian::with('warga')
            ->filter($request)
            ->search($request)
            ->latest()
            ->paginate(10);

        return view('guest.kematian.index', compact('kematian'));
    }

    public function create()
    {
        $warga = Warga::all();
        return view('guest.kematian.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required',
            'tgl_meninggal' => 'required|date',
            'sebab' => 'required',
            'lokasi' => 'required',
            'no_surat' => 'required|unique:peristiwa_kematian,no_surat',
            'files.*' => 'nullable|file|max:10240',
        ]);

        $kematian = PeristiwaKematian::create($request->all());

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $key => $file) {
                $filename = time().$key.'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/kematian'), $filename);

                Media::create([
                    'ref_table' => 'peristiwa_kematian',
                    'ref_id' => $kematian->kematian_id,
                    'file_name' => $filename,
                    'mime_type' => $file->getMimeType(),
                    'caption' => null,
                    'sort_order' => $key + 1,
                ]);
            }
        }

        return redirect()->route('kematian.index')->with('success', 'Data kematian berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kematian = PeristiwaKematian::findOrFail($id);
        $warga = Warga::all();
        $media = Media::where('ref_table', 'peristiwa_kematian')
                      ->where('ref_id', $id)
                      ->get();

        return view('guest.kematian.edit', compact('kematian', 'warga', 'media'));
    }

    public function update(Request $request, $id)
    {
        $kematian = PeristiwaKematian::findOrFail($id);

        $request->validate([
            'warga_id' => 'required',
            'tgl_meninggal' => 'required|date',
            'sebab' => 'required',
            'lokasi' => 'required',
            'no_surat' => 'required|unique:peristiwa_kematian,no_surat,' . $id . ',kematian_id',
            'files.*' => 'mimes:jpg,jpeg,png,pdf,docx,xlsx|max:2048',
        ]);

        $kematian->update($request->all());

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $key => $file) {

                $filename = time().$key.'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/kematian'), $filename);

                Media::create([
                    'ref_table' => 'peristiwa_kematian',
                    'ref_id' => $id,
                    'file_name' => $filename,
                    'mime_type' => $file->getMimeType(),
                    'caption' => null,
                    'sort_order' => $key + 1,
                ]);
            }
        }

        return redirect()->route('kematian.index')->with('success', 'Data kematian berhasil diperbarui!');
    }

    public function destroy($id)
    {
        PeristiwaKematian::findOrFail($id)->delete();

        Media::where('ref_table', 'peristiwa_kematian')
             ->where('ref_id', $id)->delete();

        return redirect()->route('kematian.index')->with('success', 'Data kematian berhasil dihapus!');
    }

    public function show($id)
    {
        $kematian = PeristiwaKematian::findOrFail($id);
        $media = Media::where('ref_table', 'peristiwa_kematian')->where('ref_id', $id)->get();

        return view('guest.kematian.show', compact('kematian', 'media'));
    }
}
