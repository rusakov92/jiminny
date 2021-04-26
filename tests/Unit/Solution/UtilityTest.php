<?php

declare(strict_types = 1);

namespace Tests\Unit\Solution;

use Jiminny\Solution\Utility;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD)
 */
class UtiliwtyTest extends TestCase
{
    // phpcs:ignoreFile
    public function testConvertToSeconds()
    {
        $this->assertEquals(1, Utility::convertToSeconds(1000));
    }

    public function testConvertToMilliseconds()
    {
        $this->assertEquals(1000, Utility::convertToMilliseconds(1));
    }

    public function testCalculatePercentage()
    {
        $this->assertEquals(33.33, Utility::calculatePercentage(1, 3));
    }
}
