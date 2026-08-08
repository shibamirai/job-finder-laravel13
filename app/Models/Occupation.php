<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Unguarded]
#[Hidden(['created_at', 'updated_at'])]
class Occupation extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_it' => 'boolean',
        ];
    }

    public function workers(): HasMany
    {
        return $this->hasMany(JobFinder::class);
    }
}
