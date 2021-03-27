<?php

namespace Vanthao03596\HCVN\Tests;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Vanthao03596\HCVN\Models\Ward;

class WardTest extends TestCase
{
    public function test_district_belongs_to_province()
    {
        $ward = new Ward();
        $relation = $ward->district();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('parent_code', $relation->getForeignKeyName());
    }
}
