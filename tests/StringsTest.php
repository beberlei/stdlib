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

    public function testContains()
    {
        $this->assertTrue(strings\contains("foo", "foo"));
        $this->assertTrue(strings\contains("foobarbaz", "bar"));
        $this->assertTrue(strings\contains("foo", ""));
        $this->assertTrue(strings\contains("", ""));

        $this->assertFalse(strings\contains("foo", "bar"));
    }

    public function testHasPrefix()
    {
        $this->assertTrue(strings\has_prefix("foo", "f"));
        $this->assertTrue(strings\has_prefix("foo", "foo"));
        $this->assertTrue(strings\has_prefix("foo", ""));

        $this->assertFalse(strings\has_prefix("foo", "bar"));
        $this->assertFalse(strings\has_prefix("foo", "ofoo"));
    }

    public function testHasSuffix()
    {
        $this->assertTrue(strings\has_suffix("foo", "o"));
        $this->assertTrue(strings\has_suffix("foo", "foo"));
        $this->assertTrue(strings\has_suffix("foo", ""));

        $this->assertFalse(strings\has_suffix("foo", "bar"));
        $this->assertFalse(strings\has_suffix("foo", "oof"));
        $this->assertFalse(strings\has_suffix("foo", "foobar"));
    }

    public function testIndex()
    {
        $this->assertEquals(0, strings\index("foo", "foo"));
        $this->assertEquals(-1, strings\index("foo", "bar"));
        $this->assertEquals(1, strings\index("foo", "o"));
    }

    public function testJoin()
    {
        $this->assertEquals("hello world", strings\join(["hello", "world"], " "));
        $this->assertEquals("1+1", strings\join(["1", "1"], "+"));
    }

    public function testLastIndex()
    {
        $this->assertEquals(3, strings\last_index("foofoo", "foo"));
        $this->assertEquals(-1, strings\last_index("foo", "bar"));
        $this->assertEquals(2, strings\last_index("foo", "o"));
    }

    public function testMap()
    {
        $this->assertEquals(
            "'Gjnf oevyyvt naq gur fyvgul tbcure...",
            strings\Map('str_rot13', "'Twas brillig and the slithy gopher...")
        );
    }

    public function testRepeat()
    {
        $this->assertEquals("foo", strings\repeat("foo", 1));
        $this->assertEquals("foofoo", strings\repeat("foo", 2));
        $this->assertEquals("", strings\repeat("foo", 0));

        $this->expectException(\UnexpectedValueException::class);
        strings\repeat("foo", -1);
    }

    public function testReplace()
    {
        $this->assertEquals("bar", strings\replace("foo", "foo", "bar"));
        $this->assertEquals("bar", strings\replace("foo", "foo", "bar", 1));
        $this->assertEquals("foo", strings\replace("foo", "foo", "bar", 0));

        $this->assertEquals("barbarfoo", strings\replace("foofoofoo", "foo", "bar", 2));
        $this->assertEquals("barbarbar", strings\replace("foofoofoo", "foo", "bar"));
    }

    public function testSplit()
    {
        $this->assertEquals(['a', 'b', 'c'], strings\split("a,b,c", ","));
        $this->assertEquals(['', 'man ', 'plan ', 'canal panama'], strings\split("a man a plan a canal panama", "a "));
        $this->assertEquals([' ', 'x', 'y', 'z', ' '], strings\split(" xyz ", ""));
        $this->assertEquals([''], strings\split("", "Bernardo O'Higgins"));

        $this->assertEquals(['a', 'b,c'], strings\split("a,b,c", ",", 2));
        $this->assertEquals(['a', 'bc'], strings\split("abc", "", 2));
    }

    public function testToLower()
    {
        $this->assertEquals('foo', strings\to_lower('FOO'));
        $this->assertEquals('foo', strings\to_lower('foo'));
    }

    public function testToUpper()
    {
        $this->assertEquals('FOO', strings\to_upper('FOO'));
        $this->assertEquals('FOO', strings\to_upper('foo'));
    }

    public function testTrim()
    {
        $this->assertEquals('Hello, Gophers', strings\trim("¡¡¡Hello, Gophers!!!", "!¡"));
        $this->assertEquals("xyz", strings\trim(" xyz "));
    }

    public function testTrimLeft()
    {
        $this->assertEquals('Hello, Gophers!!!', strings\trim_left("¡¡¡Hello, Gophers!!!", "!¡"));
        $this->assertEquals("xyz ", strings\trim_left(" xyz "));
    }

    public function testTrimRight()
    {
        $this->assertEquals('¡¡¡Hello, Gophers', strings\trim_right("¡¡¡Hello, Gophers!!!", "!¡"));
        $this->assertEquals(" xyz", strings\trim_right(" xyz "));
    }
}
