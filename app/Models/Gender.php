<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Unguarded]
#[Hidden(['created_at', 'updated_at'])]
class Gender extends Model
{
    use HasFactory;

    public function workers(): HasMany
    {
        return $this->hasMany(JobFinder::class);
    }
}
