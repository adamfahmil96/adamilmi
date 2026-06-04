<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Education extends Model
{
    protected $table = 'education';

    protected $fillable = [
        'school_name',
        'degree',
        'field_of_study',
        'start_year',
        'end_year',
        'notes',
        'activities',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'start_year' => 'integer',
            'end_year' => 'integer',
            'sort_order' => 'integer',
        ];
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderByDesc('start_year');
    }

    public function getYearRangeAttribute(): string
    {
        if ($this->end_year) {
            return "{$this->start_year} - {$this->end_year}";
        }
        return "{$this->start_year} - Present";
    }
}
