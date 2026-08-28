<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    protected $fillable = [
        'school_year_id',
        'kodikos_sxoleiou',
        'typos_sxoleiou',
        'displayname',
        'phonenumbers',
        'usermail',
        'email',
    ];

    public function schoolYear(): BelongsTo
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function excursions(): HasMany
    {
        return $this->hasMany(Excursion::class);
    }

    public function scopeForYear($query, SchoolYear $year)
    {
        return $query->where('school_year_id', $year->id);
    }

    public function scopeByCode($query, string $code)
    {
        return $query->where('kodikos_sxoleiou', $code);
    }
}
