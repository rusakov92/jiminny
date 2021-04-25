<?php

declare(strict_types = 1);

namespace Jiminny\Solution\CustomerAudio;

use Jiminny\Solution\AudioProvider;
use Jiminny\Solution\AudioSilenceIterator;
use Jiminny\Solution\SampleAudio\SampleAudioService;

/**
 * Class CustomerAudioService provides audio data from the customer.
 */
class CustomerAudioService implements AudioProvider
{
    private SampleAudioService $sampleAudioService;

    public function __construct(SampleAudioService $sampleAudioService)
    {
        $this->sampleAudioService = $sampleAudioService;
    }

    public function getAudioSilenceData(): AudioSilenceIterator
    {
        return new AudioSilenceIterator(
            $this->sampleAudioService->readSampleAudioSilenceFile('customer-channel.txt'),
        );
    }
}
