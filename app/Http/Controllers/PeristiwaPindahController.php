<?php

namespace App\Http\Controllers;

use App\Models\PeristiwaPindah;
use App\Models\Warga;
use App\Models\Media;
use Illuminate\Http\Request;

class PeristiwaPindahController extends Controller
{
    public function index(Request $request)
    {
        $pindah = PeristiwaPindah::with('warga')
            ->filter($request)
            ->search($request)
            ->latest()
            ->paginate(9);

        return view('guest.pindah.index', compact('pindah'));
    }

    public function create()
    {
        $warga = Warga::all();
        return view('guest.pindah.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required',
            'tgl_pindah' => 'required|date',
            'alamat_tujuan' => 'required',
            'alasan' => 'nullable',
            'no_surat' => 'required|unique:peristiwa_pindah,no_surat',
        ]);

        $data = PeristiwaPindah::create($request->all());

        // MULTI-FILE UPLOAD
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $filename = time() . "_" . $index . "_" . $file->getClientOriginalName();
                $file->move(public_path('uploads/pindah'), $filename);

                Media::create([
                    'ref_table' => 'peristiwa_pindah',
                    'ref_id' => $data->pindah_id,
                    'file_name' => $filename,
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('pindah.index')->with('success', 'Data pindah berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pindah = PeristiwaPindah::findOrFail($id);
        $warga = Warga::all();
        $media = Media::where('ref_table', 'peristiwa_pindah')
                      ->where('ref_id', $id)
                      ->get();

        return view('guest.pindah.edit', compact('pindah','warga','media'));
    }

    public function update(Request $request, $id)
    {
        $pindah = PeristiwaPindah::findOrFail($id);

        $request->validate([
            'warga_id' => 'required',
            'tgl_pindah' => 'required|date',
            'alamat_tujuan' => 'required',
            'alasan' => 'nullable',
            'no_surat' => 'required|unique:peristiwa_pindah,no_surat,' . $id . ',pindah_id',
            'files.*' => 'mimes:jpg,jpeg,png,pdf,docx,xlsx|max:2048',
        ]);

        $pindah->update($request->all());

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $filename = time() . "_" . $index . "_" . $file->getClientOriginalName();
                $file->move(public_path('uploads/pindah'), $filename);

                Media::create([
                    'ref_table' => 'peristiwa_pindah',
                    'ref_id' => $pindah->pindah_id,
                    'file_name' => $filename,
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('pindah.index')->with('success', 'Data pindah berhasil diperbarui!');
    }

    public function show($id)
    {
        $pindah = PeristiwaPindah::with('warga')->findOrFail($id);
        $media = Media::where('ref_table', 'peristiwa_pindah')
                      ->where('ref_id', $id)
                      ->get();

        return view('guest.pindah.show', compact('pindah','media'));
    }

    public function destroy($id)
    {
        PeristiwaPindah::findOrFail($id)->delete();
        return redirect()->route('pindah.index')->with('success', 'Data pindah berhasil dihapus!');
    }
}
