<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'foto',
    ];

    // === GENERAL FILTER (seperti Warga) ===
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }

    // === SEARCH ===
    public function scopeSearch(Builder $query, Request $request, array $columns): Builder
    {
        if ($request->filled('search')) {
            $keyword = $request->input('search');

            $query->where(function ($q) use ($columns, $keyword) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', "%{$keyword}%");
                }
            });
        }

        return $query;
    }
}
