<?php

declare(strict_types = 1);

namespace Jiminny\Solution;

use function abs;
use function round;

use const PHP_ROUND_HALF_DOWN;

/**
 * Class Utility has common helper methods.
 */
class Utility
{
    public static function convertToMilliseconds(float $seconds): int
    {
        return (int) round(abs($seconds) * 1000, 0, PHP_ROUND_HALF_DOWN);
    }

    public static function convertToSeconds(int $milliseconds): float
    {
        return (float) (abs($milliseconds) / 1000);
    }

    public static function calculatePercentage(int $portionValue, int $entireValue): float
    {
        return round(($portionValue / $entireValue) * 100, 2);
    }
}
