<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeristiwaKelahiran extends Model
{
    protected $table = 'peristiwa_kelahiran';
    protected $primaryKey = 'kelahiran_id';

    protected $fillable = [
        'warga_id',
        'ayah_warga_id',
        'ibu_warga_id',
        'tgl_lahir',
        'tempat_lahir',
        'no_akta'
    ];

    // RELASI
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
    }

    public function ayah()
    {
        return $this->belongsTo(Warga::class, 'ayah_warga_id', 'warga_id');
    }

    public function ibu()
    {
        return $this->belongsTo(Warga::class, 'ibu_warga_id', 'warga_id');
    }

    // SCOPE SEARCH
    public function scopeSearch($q, $request)
    {
        if ($request->search) {
            $q->where('no_akta', 'like', "%" . $request->search . "%")
              ->orWhere('tempat_lahir', 'like', "%" . $request->search . "%")
              ->orWhere('tgl_lahir', 'like', "%" . $request->search . "%");
        }
    }

    // FILTER
    public function scopeFilter($q, $request)
    {
        if ($request->tempat_lahir) {
            $q->where('tempat_lahir', $request->tempat_lahir);
        }

        if ($request->tgl_lahir) {
            $q->where('tgl_lahir', $request->tgl_lahir);
        }
    }
}
