<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function scopeFilter(Builder $query, $request, array $columns)
    {
        foreach ($columns as $col) {
            if ($request->filled($col)) {
                $query->where($col, $request->$col);
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