<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\UnGuarded;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[UnGuarded]
#[Hidden(['created_at', 'updated_at'])]
class JobFinder extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'has_certificate' => 'boolean',
            'is_handicaps_opened' => 'boolean',
        ];
    }

    public function employmentPattern(): BelongsTo
    {
        return $this->belongsTo(EmploymentPattern::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function handicaps(): BelongsToMany
    {
        return $this->belongsToMany(Handicap::class);
    }

    public function occupation(): BelongsTo
    {
        return $this->belongsTo(Occupation::class);
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }

    public function works(): HasMany
    {
        return $this->hasMany(Work::class);
    }

    public function hired(): Attribute
    {
        return new Attribute(
            get: fn () => date('Y年m月', strtotime($this->hired_at))
        );
    }

    public function periodOfUse(): Attribute
    {
        return new Attribute(
            get: function () {
                $diff = date_diff(
                    new DateTime($this->use_from),
                    new DateTime($this->hired_at)
                );
                return ($diff->y > 0 ? $diff->y . '年' : '') . $diff->m . 'ヶ月';
            }
        );
    }

    public function daysOfUse(): Attribute
    {
        return new Attribute(
            get: fn () => date_diff(
                    new DateTime($this->use_from),
                    new DateTime($this->hired_at)
                )->days
            );
    }
}
