<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeristiwaPindah extends Model
{
    protected $table = 'peristiwa_pindah';
    protected $primaryKey = 'pindah_id';

    protected $fillable = [
        'warga_id',
        'tgl_pindah',
        'alamat_tujuan',
        'alasan',
        'no_surat'
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    // SEARCH
    public function scopeSearch($query, $request)
    {
        $search = $request->search;

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('alamat_tujuan', 'like', "%$search%")
                  ->orWhere('alasan', 'like', "%$search%")
                  ->orWhere('no_surat', 'like', "%$search%");
            });
        }
        return $query;
    }

    // FILTER
    public function scopeFilter($query, $request)
    {
        if ($request->tgl_pindah) {
            $query->where('tgl_pindah', $request->tgl_pindah);
        }
        return $query;
    }
}
