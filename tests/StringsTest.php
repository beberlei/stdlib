<?php

namespace php;

use php\strings;
use PHPUnit\Framework\TestCase;

class StringsTest extends TestCase
{
    public function dataCompare()
    {
        return [
            [0, "foo", "foo"],
            [-1, "bar", "foo"],
            [1, "foo", "bar"],
        ];
    }

    /**
     * @dataProvider dataCompare
     */
    public function testCompare(int $expected, string $a, string $b)
    {
        $this->assertSame($expected, strings\compare($a, $b));
    }
}
