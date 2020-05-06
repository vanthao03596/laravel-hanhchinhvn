<?php

namespace Vanthao03596\HCVN\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class City extends Model
{
    protected $guarded = [];

    public function districts(): HasMany
    {
        return $this->hasMany(District::class, 'parent_code', 'code');
    }

    public function wards(): HasManyThrough
    {
        return $this->hasManyThrough(Ward::class, District::class, 'parent_code', 'parent_code', 'code', 'code');
    }
}
