<?php

namespace Vanthao03596\HCVN\Tests;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Vanthao03596\HCVN\Models\Province;

class ProvinceTest extends TestCase
{
    public function test_province_has_many_districts()
    {
        $province = new Province();
        $relation = $province->districts();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('parent_code', $relation->getForeignKeyName());
        $this->assertEquals('code', $relation->getLocalKeyName());
    }

    public function test_province_has_many_wards_through_districts()
    {
        $province = new Province();
        $relation = $province->wards();

        $this->assertInstanceOf(HasManyThrough::class, $relation);
        $this->assertEquals('parent_code', $relation->getFirstKeyName());
        $this->assertEquals('parent_code', $relation->getForeignKeyName());
        $this->assertEquals('code', $relation->getLocalKeyName());
        $this->assertEquals('code', $relation->getSecondLocalKeyName());
    }
}
