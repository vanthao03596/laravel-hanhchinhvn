<?php

namespace Vanthao03596\HCVN\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    protected $guarded = [];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'parent_code', 'code');
    }

    public function wards(): HasMany
    {
        return $this->hasMany(Ward::class, 'parent_code', 'code');
    }
}
