<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'stroke', 'price', 'image'];


    public function scopeTitle(Builder $query, $title)
    {
        return $query->where('name', 'LIKE', '%' . $title . '%');
    }

    public function scopeAsc(Builder $query, $column)
    {
        return $query->orderBy($column, 'asc');
    }

    public function scopeDesc(Builder $query, $column)
    {
        return $query->orderBy($column, 'desc');
    }
}
