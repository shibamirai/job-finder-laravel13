<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Unguarded]
#[Hidden(['created_at', 'updated_at'])]
class Handicap extends Model
{
    use HasFactory;

    public function affects(): BelongsToMany
    {
        return $this->belongsToMany(JobFinder::class);
    }
}
