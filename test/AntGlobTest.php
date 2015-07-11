<?php

namespace Wjdhollow;



use PHPUnit_Framework_TestCase;


class AntGlobTest extends PHPUnit_Framework_TestCase
{

    /**
     * @param string[] $pattern
     * @param string[] $hits
     * @param string[] $misses
     *
     * @dataProvider testToRegexReturnsExpected
     *
     */
    public function testIsMatch($pattern, $hits, $misses)
    {
        $glob = new AntGlob($pattern, true);
        foreach ($hits as $hit) {
            $this->assertTrue($glob->isMatch($hit));
        }
        foreach ($misses as $miss) {
            $this->assertFalse($glob->isMatch($miss));
        }
    }

    public function testToRegexReturnsExpected()
    {
        return [
            [
                '**/CVS/*',
                ['CVS/Repository', 'org/apache/CVS/Entries', 'org/apache/jakarta/tools/ant/CVS/Entries'],
                ['org/apache/CVS/foo/bar/Entries'],
            ],
            [
                'org/apache/jakarta/**',
                ['org/apache/jakarta/tools/ant/docs/index.html', 'org/apache/jakarta/test.xml'],
                ['org/apache/xyz.java'],
            ],
            [
                'org/apache/**/CVS/*',
                ['org/apache/CVS/Entries', 'org/apache/jakarta/tools/ant/CVS/Entries'],
                ['org/apache/CVS/foo/bar/Entries'],
            ],
            [
                '**/test/**',
                ['org/test/core', 'test/file.xml'],
                ['test.txt']
            ]
        ];
    }
}