<?php

namespace Vanthao03596\HCVN\Tests;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Vanthao03596\HCVN\Models\District;

class DistrictTest extends TestCase
{
    public function test_district_belongs_to_province()
    {
        $district = new District();
        $relation = $district->province();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('parent_code', $relation->getForeignKeyName());
    }

    public function test_district_has_many_wards()
    {
        $district = new District();
        $relation = $district->wards();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('parent_code', $relation->getForeignKeyName());
        $this->assertEquals('code', $relation->getLocalKeyName());
    }
}
