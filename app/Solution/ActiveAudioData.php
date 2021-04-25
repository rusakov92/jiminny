<?php

declare(strict_types = 1);

namespace Jiminny\Solution;

use LogicException;

use function sprintf;

/**
 * Class ActiveAudioData provides start and end points where there was NO audio silence.
 */
class ActiveAudioData
{
    private int $startMilliseconds;
    private int $endMilliseconds;

    public function __construct(int $startMilliseconds, int $endMilliseconds)
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
    }

    public function getStartMilliseconds(): int
    {
        return $this->startMilliseconds;
    }

    public function getEndMilliseconds(): int
    {
        return $this->endMilliseconds;
    }

    /**
     * @return array<float>
     */
    public function toArrayInSeconds(): array
    {
        return [Utility::convertToSeconds($this->startMilliseconds), Utility::convertToSeconds($this->endMilliseconds)];
    }
}
