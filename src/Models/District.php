<?php

namespace Vanthao03596\HCVN\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('hcvn.table_names.districts'));
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'parent_code', 'code');
    }

    public function wards(): HasMany
    {
        return $this->hasMany(Ward::class, 'parent_code', 'code');
    }
}
