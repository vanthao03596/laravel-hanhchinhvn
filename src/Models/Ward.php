<?php

namespace Vanthao03596\HCVN\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ward extends Model
{
    protected $guarded = [];

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'parent_id', 'code');
    }
}
