<?php

declare(strict_types = 1);

namespace Jiminny\Solution;

/**
 * Interface AudioProvider is a contract for every service that can provide different audio data.
 */
interface AudioProvider
{
    public function getAudioSilenceData(): AudioSilenceIterator;
}
