<?php

namespace PlanB\Utils\Path;

use PlanB\Utils\Dev\Tdd\Test\Unit;


/**
 * Path Class Test
 * @coversDefaultClass PlanB\Utils\Path\Path
 */
class PathTest extends Unit
{


    /**
     * @test
     * @dataProvider providerJoin
     *
     * @covers ::join
     */
    public function testJoin($expected, ...$parts)
    {
        $response = Path::join(...$parts);
        $this->assertEquals($expected, $response);

    }

    public function providerJoin()
    {
        return [
            ['/', '/', '///', '////', '////', '///'],
            ['/path/to/dir/or/file', '/', 'path///', '////to', '////', '', '///dir//or///', 'file'],
            ['/path', '/', '/path/to///', '..'],
            ['/', '/', '/path/to///', '../..'],
        ];
    }

}