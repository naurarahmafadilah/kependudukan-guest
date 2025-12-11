<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class KeluargaKk extends Model
{
    use HasFactory;

    protected $table = 'keluarga_kk';
    protected $primaryKey = 'kk_id';
    protected $fillable = [
        'kk_nomor',
        'kepala_keluarga_warga_id',
        'alamat',
        'rt',
        'rw'
    ];

    public function kepalaKeluarga()
    {
        return $this->belongsTo(Warga::class, 'kepala_keluarga_warga_id');
    }

    public function anggota()
    {
        return $this->hasMany(AnggotaKeluarga::class, 'kk_id', 'kk_id');
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
