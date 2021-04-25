<?php

declare(strict_types = 1);

namespace Jiminny\Solution;

use Exception;
use LogicException;

use function sprintf;

/**
 * Class AudioSilenceData provides start and end points where there was only audio silence.
 */
class AudioSilenceData
{
    private int $startMilliseconds;
    private int $endMilliseconds;
    private int $durationMilliseconds;

    public function __construct(int $startMilliseconds, int $endMilliseconds, int $durationMilliseconds)
    {
        if ($startMilliseconds > $endMilliseconds) {
            throw new LogicException(sprintf(
                'The start %s of the active audio cannot be bigger then the end %s.',
                Utility::convertToSeconds($startMilliseconds),
                Utility::convertToSeconds($endMilliseconds),
            ));
        }

        $this->startMilliseconds = $startMilliseconds;
        $this->endMilliseconds = $endMilliseconds;
        $this->durationMilliseconds = $durationMilliseconds;
    }

    public function getStartMilliseconds(): int
    {
        return $this->startMilliseconds;
    }

    public function getEndMilliseconds(): int
    {
        return $this->endMilliseconds;
    }

    public function getDurationMilliseconds(): int
    {
        return $this->durationMilliseconds;
    }

    public static function createFrommSeconds(float $start, float $end, float $duration): self
    {
        return new self(
            Utility::convertToMilliseconds($start),
            Utility::convertToMilliseconds($end),
            Utility::convertToMilliseconds($duration)
        );
    }
}
