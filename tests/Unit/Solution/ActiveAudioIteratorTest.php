<?php

declare(strict_types = 1);

namespace Tests\Unit\Solution;

use Jiminny\Solution\ActiveAudioData;
use Jiminny\Solution\ActiveAudioIterator;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD)
 */
class ActiveAudioIteratorTest extends TestCase
{
    // phpcs:ignoreFile
    public function testGetEntireMonolog()
    {
        $obj = new ActiveAudioIterator([new ActiveAudioData(0, 4000), new ActiveAudioData(6000, 10000)]);
        $this->assertEquals(8000, $obj->getEntireMonolog());
    }

    public function testToPointsInSeconds()
    {
        $obj = new ActiveAudioIterator([new ActiveAudioData(0, 4000), new ActiveAudioData(6000, 10000)]);
        $this->assertEquals([
            [0, 4],
            [6, 10],
        ], $obj->toPointsInSeconds());
    }

    public function testGetLongestMonolog()
    {
        $obj = new ActiveAudioIterator([new ActiveAudioData(0, 4000), new ActiveAudioData(6000, 10001)]);
        $this->assertEquals(4001, $obj->getLongestMonolog());
    }
}
