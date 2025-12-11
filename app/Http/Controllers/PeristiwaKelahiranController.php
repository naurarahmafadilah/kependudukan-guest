<?php

namespace App\Http\Controllers;

use App\Models\PeristiwaKelahiran;
use App\Models\Warga;
use App\Models\Media;
use Illuminate\Http\Request;

class PeristiwaKelahiranController extends Controller
{
    public function index(Request $request)
    {
        $kelahiran = PeristiwaKelahiran::with(['warga', 'ayah', 'ibu'])
            ->filter($request)
            ->search($request)
            ->latest()
            ->paginate(10);

        return view('guest.kelahiran.index', compact('kelahiran'));
    }

    public function create()
    {
        $warga = Warga::all();
        return view('guest.kelahiran.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'ayah_warga_id' => 'nullable',
            'ibu_warga_id' => 'nullable',
            'no_akta' => 'required|unique:peristiwa_kelahiran,no_akta',
            'files.*' => 'mimes:jpg,jpeg,png,pdf,docx,xlsx|max:2048',
        ]);

        $kelahiran = PeristiwaKelahiran::create($request->all());

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $i => $file) {
                $filename = time() . '-' . $i . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/kelahiran'), $filename);

                Media::create([
                    'ref_table' => 'peristiwa_kelahiran',
                    'ref_id' => $kelahiran->kelahiran_id,
                    'file_name' => $filename,
                    'mime_type' => $file->getMimeType(),
                    'sort_order' => $i + 1
                ]);
            }
        }

        return redirect()->route('kelahiran.index')->with('success', 'Data kelahiran berhasil ditambahkan!');
    }

    public function show($id)
    {
        $kelahiran = PeristiwaKelahiran::findOrFail($id);
        $media = Media::where('ref_table', 'peristiwa_kelahiran')
                      ->where('ref_id', $id)
                      ->get();

        return view('guest.kelahiran.show', compact('kelahiran', 'media'));
    }

    public function edit($id)
    {
        $kelahiran = PeristiwaKelahiran::findOrFail($id);
        $warga = Warga::all();
        $media = Media::where('ref_table', 'peristiwa_kelahiran')
                      ->where('ref_id', $id)->get();

        return view('guest.kelahiran.edit', compact('kelahiran', 'warga', 'media'));
    }

    public function update(Request $request, $id)
    {
        $kelahiran = PeristiwaKelahiran::findOrFail($id);

        $request->validate([
            'warga_id' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'ayah_warga_id' => 'nullable',
            'ibu_warga_id' => 'nullable',
            'no_akta' => 'required|unique:peristiwa_kelahiran,no_akta,' . $id . ',kelahiran_id',
            'files.*' => 'nullable|file|max:10240'
        ]);

        $kelahiran->update($request->all());

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $i => $file) {
                $filename = time() . '-' . $i . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/kelahiran'), $filename);

                Media::create([
                    'ref_table' => 'peristiwa_kelahiran',
                    'ref_id' => $id,
                    'file_name' => $filename,
                    'mime_type' => $file->getMimeType(),
                    'sort_order' => $i + 1
                ]);
            }
        }

        return redirect()->route('kelahiran.index')->with('success', 'Data kelahiran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        PeristiwaKelahiran::findOrFail($id)->delete();

        Media::where('ref_table', 'peristiwa_kelahiran')->where('ref_id', $id)->delete();

        return redirect()->route('kelahiran.index')->with('success', 'Data kelahiran berhasil dihapus!');
    }
}
