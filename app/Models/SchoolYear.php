<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolYear extends Model
{
    protected $table = 'schoolyears';

    protected $fillable = [
        'sxoliko_etos',
        'is_current',
    ];

    protected $casts = [
        'is_current' => 'boolean',
    ];

    public function schools(): HasMany
    {
        return $this->hasMany(School::class);
    }

    public function excursions(): HasMany
    {
        return $this->hasMany(Excursion::class);
    }

    public static function getCurrent(): ?self
    {
        return static::where('is_current', true)->first();
    }

    public static function setCurrent(string $sxolikoEtos): void
    {
        static::where('is_current', true)->update(['is_current' => false]);
        static::where('sxoliko_etos', $sxolikoEtos)->update(['is_current' => true]);
    }

    public static function getSessionCurrent(): ?self
    {
        $sessionYear = session('current_school_year');
        if (! $sessionYear || ! isset($sessionYear['id'])) {
            $current = static::getCurrent();
            if ($current) {
                session(['current_school_year' => $current->toArray()]);
            }

            return $current;
        }

        return static::find($sessionYear['id']);
    }

    public function setSessionCurrent(): void
    {
        session(['current_school_year' => $this->toArray()]);
    }
}
