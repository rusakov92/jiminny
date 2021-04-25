<?php

declare(strict_types = 1);

namespace Jiminny\Solution;

use ArrayIterator;

/**
 * Class ActiveAudioIterator a collection of active audio logs.
 */
class ActiveAudioIterator extends ArrayIterator
{
    private int $longestMonolog = 0;
    private int $entireMonolog = 0;

    public function calculateLongestMonolog(): void
    {
        $longestMonolog = 0;
        /** @var ActiveAudioData $item */
        foreach ($this->getArrayCopy() as $item) {
            $monologLength = $item->getEndMilliseconds() - $item->getStartMilliseconds();
            if ($monologLength > $longestMonolog) {
                $longestMonolog = $monologLength;
            }
        }

        $this->longestMonolog = $longestMonolog;
    }

    public function calculateEntireMonolog(): void
    {
        $entireMonolog = 0;
        foreach ($this->getArrayCopy() as $item) {
            $entireMonolog += $item->getEndMilliseconds() - $item->getStartMilliseconds();
        }

        $this->entireMonolog = $entireMonolog;
    }

    public function getLongestMonolog(): int
    {
        if (!$this->longestMonolog) {
            $this->calculateLongestMonolog();
        }

        return $this->longestMonolog;
    }

    public function getEntireMonolog(): int
    {
        if (!$this->entireMonolog) {
            $this->calculateEntireMonolog();
        }

        return $this->entireMonolog;
    }

    public function getLongestMonologInSeconds(): float
    {
        return Utility::convertToSeconds($this->getLongestMonolog());
    }

    public function clearLongestMonolog(): void
    {
        $this->longestMonolog = 0;
    }

    public function clearEntireMonolog(): void
    {
        $this->entireMonolog = 0;
    }

    public function offsetSet($key, $value)
    {
        parent::offsetSet($key, $value);

        $this->clearLongestMonolog();
        $this->clearEntireMonolog();
    }

    public function toPointsInSeconds(): array
    {
        $result = [];
        /** @var ActiveAudioData $item */
        foreach ($this->getArrayCopy() as $item) {
            $result[] = $item->toArrayInSeconds();
        }

        return $result;
    }
}
