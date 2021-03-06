<?php

declare(strict_types = 1);

namespace Jiminny\Solution\UserAudio;

use Jiminny\Solution\AudioProvider;
use Jiminny\Solution\AudioSilenceIterator;
use Jiminny\Solution\SampleAudio\SampleAudioService;

/**
 * Class UserAudioService provides audio data from the user.
 */
class UserAudioService implements AudioProvider
{
    private SampleAudioService $sampleAudioService;

    public function __construct(SampleAudioService $sampleAudioService)
    {
        $this->sampleAudioService = $sampleAudioService;
    }

    public function getAudioSilenceData(): AudioSilenceIterator
    {
        return new AudioSilenceIterator(
            $this->sampleAudioService->readSampleAudioSilenceFile('user-channel.txt')
        );
    }
}
