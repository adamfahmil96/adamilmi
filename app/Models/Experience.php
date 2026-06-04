<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Experience extends Model
{
    protected $fillable = [
        'company',
        'position',
        'location',
        'description',
        'start_date',
        'end_date',
        'is_current',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'is_current' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderByDesc('start_date');
    }

    public function scopeCurrent(Builder $query): Builder
    {
        return $query->where('is_current', true);
    }

    protected function dateRange(): Attribute
    {
        return Attribute::make(
            get: function () {
                $start = $this->start_date->format('M Y');
                
                if ($this->is_current) {
                    return "{$start} - Present";
                }
                
                if ($this->end_date) {
                    $end = $this->end_date->format('M Y');
                    return "{$start} - {$end}";
                }
                
                return $start;
            }
        );
    }

    protected function duration(): Attribute
    {
        return Attribute::make(
            get: function () {
                $end = $this->is_current ? now() : $this->end_date;
                
                if (!$end) {
                    return '';
                }
                
                $months = $this->start_date->diffInMonths($end);
                $years = intdiv($months, 12);
                $remainingMonths = $months % 12;
                
                $parts = [];
                if ($years > 0) {
                    $parts[] = $years . ' yr' . ($years > 1 ? 's' : '');
                }
                if ($remainingMonths > 0) {
                    $parts[] = $remainingMonths . ' mo' . ($remainingMonths > 1 ? 's' : '');
                }
                
                return implode(' ', $parts);
            }
        );
    }
}
