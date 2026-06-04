<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'category',
        'icon',
        'proficiency',
        'is_highlighted',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'proficiency' => 'integer',
            'is_highlighted' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeByCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }

    public function scopeHighlighted(Builder $query): Builder
    {
        return $query->where('is_highlighted', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function scopeGroupedByCategory(Builder $query): Builder
    {
        return $query->ordered()->groupBy('category');
    }

    public static function categories(): array
    {
        return [
            'backend' => 'Backend',
            'frontend' => 'Frontend',
            'database' => 'Database',
            'devops' => 'DevOps',
            'tools' => 'Tools',
            'other' => 'Other',
        ];
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::categories()[$this->category] ?? $this->category;
    }
}
