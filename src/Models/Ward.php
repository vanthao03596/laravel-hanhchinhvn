<?php

namespace Vanthao03596\HCVN\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ward extends Model
{
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('hcvn.table_names.wards'));
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'parent_code', 'code');
    }
}
