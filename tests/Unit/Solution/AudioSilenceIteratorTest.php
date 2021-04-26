<?php

declare(strict_types = 1);

namespace Tests\Unit\Solution;

use Jiminny\Solution\AudioSilenceData;
use Jiminny\Solution\AudioSilenceIterator;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD)
 */
class AudioSilenceIteratorTest extends TestCase
{
    // phpcs:ignoreFile
    public function testGetActiveAudioData()
    {
        $obj = new AudioSilenceIterator([new AudioSilenceData(3000, 5000, 2000), new AudioSilenceData(6000, 9000, 3000)]);
        $result = $obj->getActiveAudioData();
        $this->assertCount(2, $result);
        $this->assertEquals(0, $result[0]->getStartMilliseconds());
        $this->assertEquals(6000, $result[1]->getEndMilliseconds());
    }

    public function testGetAudioEndMilliseconds()
    {
        $obj = new AudioSilenceIterator([new AudioSilenceData(3000, 5000, 2000), new AudioSilenceData(6000, 9000, 3000)]);
        $this->assertEquals(9000, $obj->getAudioEndMilliseconds());
    }
}
