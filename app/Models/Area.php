<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    use HasFactory;

    public function properties(): HasMany{
        return $this->hasMany(Property::class);
    }

    public function country(): BelongsTo{
        return $this->belongsTo(Country::class);
    }
}
