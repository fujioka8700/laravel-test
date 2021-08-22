<?php

namespace Tests\Unit\Sample;

use PHPUnit\Framework\TestCase;
use App\Sample;

use function PHPUnit\Framework\assertJson;

class SampleTest extends TestCase
{
    public function test_add()
    {
        $sample = new Sample();
        $sum = $sample->add(5, 3);
        $this->assertEquals(8, $sum);
    }

    /**
     * @test
     */
    public function 引き算()
    {
        $sample = new Sample();
        $sum = $sample->sub(5, 3);
        $this->assertEquals(2, $sum);
    }
}
