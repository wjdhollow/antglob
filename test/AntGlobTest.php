<?php

namespace Wjdhollow;



use PHPUnit_Framework_TestCase;


class AntGlobTest extends PHPUnit_Framework_TestCase
{

    /**
     * @param string $pattern
     * @param string $expected
     *
     * @dataProvider testToRegexReturnsExpected
     *
     */
    public function testCtr($pattern, $expected)
    {
        $this->assertEquals(
            $expected,
            (new AntGlob($pattern))->toRegex()
        );
    }

    public function testToRegexReturnsExpected()
    {
        return [
            ['coverage.xml', 'coverage\.xml'],
            ['**/scala/copy_of_cobertura.xml', '.*\/scala\/copy_of_cobertura\.xml'],
            ['/dir/file.txt', 'file\.txt'],
            ['/dir/sub/**/inner/foo.txt', '.*\/inner\/foo\.txt'],
            ['scala/sub/', 'scala\/sub\/.*'],
            ['b?d/file.txt', 'b.d\/file\.txt'],
        ];
    }
}