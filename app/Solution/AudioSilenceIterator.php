<?php

declare(strict_types = 1);

namespace Jiminny\Solution;

use ArrayIterator;

use function array_shift;

/**
 * Class AudioSilenceIterator a collection of audio silence data logs.
 */
class AudioSilenceIterator extends ArrayIterator
{
    public function getAudioEndMilliseconds(): int
    {
        /** @var AudioSilenceData $lastItem */
        $lastItem = $this->offsetGet($this->count() - 1);

        return $lastItem->getEndMilliseconds();
    }

    public function getActiveAudioData(): ActiveAudioIterator
    {
        $result = [];
        $data = $this->getArrayCopy();
        /** @var AudioSilenceData $previousItem */
        $previousItem = array_shift($data);

        $result[] = new ActiveAudioData(0, $previousItem->getStartMilliseconds());
        foreach ($data as $item) {
            // Record active audio if the end of the previous silence log is older the the start of the new silence log.
            if ($item->getStartMilliseconds() > $previousItem->getEndMilliseconds()) {
                $result[] = new ActiveAudioData($previousItem->getEndMilliseconds(), $item->getStartMilliseconds());
            }
            $previousItem = $item;
        }

        return new ActiveAudioIterator($result);
    }
}
