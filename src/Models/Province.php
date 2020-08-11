<?php

namespace Vanthao03596\HCVN\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Province extends Model
{
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('hcvn.table_names.provinces'));
    }

    public function districts(): HasMany
    {
        return $this->hasMany(District::class, 'parent_code', 'code');
    }

    public function wards(): HasManyThrough
    {
        return $this->hasManyThrough(Ward::class, District::class, 'parent_code', 'parent_code', 'code', 'code');
    }
}
