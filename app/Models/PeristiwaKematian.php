<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeristiwaKematian extends Model
{
    protected $table = 'peristiwa_kematian';
    protected $primaryKey = 'kematian_id';

    protected $fillable = [
        'warga_id',
        'tgl_meninggal',
        'sebab',
        'lokasi',
        'no_surat',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
    }

    // SEARCH
    public function scopeSearch($query, $request)
    {
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('no_surat', 'like', "%{$request->search}%")
                  ->orWhere('sebab', 'like', "%{$request->search}%")
                  ->orWhere('lokasi', 'like', "%{$request->search}%");
            });
        }
        return $query;
    }

    // FILTER
    public function scopeFilter($query, $request)
    {
        if ($request->tgl_meninggal) {
            $query->where('tgl_meninggal', $request->tgl_meninggal);
        }
        return $query;
    }
}
