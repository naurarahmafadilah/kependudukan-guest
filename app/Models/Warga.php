<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'warga';
    protected $primaryKey = 'warga_id';

    protected $fillable = [
        'no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email'
    ];

    /* ===============================
     | RELASI
     |===============================*/

    // 🏠 Keluarga (KK tempat warga terdaftar)
    public function keluarga()
    {
        return $this->belongsTo(KeluargaKk::class, 'kk_id', 'kk_id');
    }

    // 👨‍👩‍👧 Anggota keluarga
    public function anggotaKeluarga()
    {
        return $this->hasMany(AnggotaKeluarga::class, 'warga_id', 'warga_id');
    }

    // 👶 Peristiwa kelahiran
    public function kelahiran()
    {
        return $this->hasOne(PeristiwaKelahiran::class, 'warga_id', 'warga_id');
    }

    // ⚰️ Peristiwa kematian
    public function kematian()
    {
        return $this->hasOne(PeristiwaKematian::class, 'warga_id', 'warga_id');
    }

    // 🚚 Peristiwa pindah domisili
    public function pindah()
    {
        return $this->hasOne(PeristiwaPindah::class, 'warga_id', 'warga_id');
    }

    /* ===============================
     | SCOPE FILTER
     |===============================*/
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }

    /* ===============================
     | SCOPE SEARCH
     |===============================*/
    public function scopeSearch(Builder $query, $request, array $columns): Builder
    {
        if ($request->filled('search')) {
            $keyword = $request->input('search');

            $query->where(function ($q) use ($columns, $keyword) {
                foreach ($columns as $col) {
                    $q->orWhere($col, 'LIKE', "%{$keyword}%");
                }
            });
        }

        return $query;
    }
}
