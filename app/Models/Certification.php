<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Certification extends Model
{
    protected $fillable = [
        'name',
        'issuing_organization',
        'license_number',
        'issue_date',
        'expiry_date',
        'credential_url',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'issue_date' => 'date',
            'expiry_date' => 'date',
            'sort_order' => 'integer',
        ];
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderByDesc('issue_date');
    }

    public function isExpired(): bool
    {
        return $this->expiry_date && $this->expiry_date->isPast();
    }

    public function getStatusAttribute(): string
    {
        if ($this->isExpired()) {
            return 'Expired';
        }
        return 'Active';
    }
}
