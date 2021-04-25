<?php

declare(strict_types = 1);

namespace Jiminny\Solution\SampleAudio;

use Jiminny\Solution\AudioSilenceData;
use RuntimeException;

use function fclose;
use function fgets;
use function fopen;
use function in_array;
use function preg_match;
use function trim;

/**
 * Class SampleAudioService provides sample audio to use for testing.
 */
class SampleAudioService
{
    /**
     * @return array<AudioSilenceData>
     *
     * @throws RuntimeException
     */
    public function readSampleAudioSilenceFile(string $fileName): array
    {
        if (!in_array($fileName, ['user-channel.txt', 'customer-channel.txt'], true)) {
            throw new RuntimeException('You can only read sample files named \'user-channel.txt\', \'customer-channel.txt\'.');
        }

        $result = [];
        $index = 1;
        $start = null;

        $file = fopen(__DIR__.'/'.$fileName, 'rb');
        while ($line = fgets($file)) {
            $line = trim($line);

            if ($index % 2 === 0) {
                preg_match('{silence_end: ([0-9\.]+) \| silence_duration: ([0-9\.]+)$}', $line, $match);
                $end = (float) $match[1];
                $duration = (float) $match[2];

                $result[] = AudioSilenceData::createFrommSeconds($start, $end, $duration);
            } else {
                preg_match('{silence_start: ([0-9\.]+)$}', $line, $match);
                $start = (float) $match[1];
            }

            ++$index;
        }
        fclose($file);

        return $result;
    }
}
