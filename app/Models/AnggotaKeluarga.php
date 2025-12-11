<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AnggotaKeluarga extends Model
{
    protected $table      = 'anggota_keluarga';
    protected $primaryKey = 'anggota_id';
    public $incrementing  = true;
    protected $keyType    = 'int';

    protected $fillable = [
        'kk_id',
        'warga_id',
        'hubungan',
    ];

    public function keluarga()
    {
        return $this->belongsTo(KeluargaKk::class, 'kk_id', 'kk_id');
    }

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
    }

    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }


    /**
     * Scope: search (LIKE) across columns (support relasi via dot-notation)
     * Sesuai modul (scopeSearch)
     */
    public function scopeSearch(Builder $query, $request, array $columns): Builder
    {
        if (! $request->filled('search')) {
            return $query;
        }

        $kw = $request->input('search');

        $query->where(function ($q) use ($columns, $kw) {
            foreach ($columns as $col) {
                if (strpos($col, '.') !== false) {
                    [$rel, $relCol] = explode('.', $col, 2);
                    $q->orWhereHas($rel, function ($qr) use ($relCol, $kw) {
                        $qr->where($relCol, 'LIKE', "%{$kw}%");
                    });
                } else {
                    $q->orWhere($col, 'LIKE', "%{$kw}%");
                }
            }
        });

    }

    // 🔎 SEARCH (sesuai modul tapi aku tambahin pencarian ke relasi biar lebih berguna)
    public function scopeSearch(Builder $query, $request, array $columns): Builder
    {
        if ($request->filled('search')) {
            $keyword = $request->input('search');

            $query->where(function ($q) use ($columns, $keyword) {
                // cari di kolom langsung (misal: hubungan)
                foreach ($columns as $col) {
                    $q->orWhere($col, 'LIKE', "%{$keyword}%");
                }

                // cari di relasi warga (nama & no_ktp)
                $q->orWhereHas('warga', function ($w) use ($keyword) {
                    $w->where('nama', 'LIKE', "%{$keyword}%")
                        ->orWhere('no_ktp', 'LIKE', "%{$keyword}%");
                });

                // cari di relasi keluarga (kk_nomor)
                $q->orWhereHas('keluarga', function ($k) use ($keyword) {
                    $k->where('kk_nomor', 'LIKE', "%{$keyword}%");
                });
            });
        }

        return $query;
    }
}
