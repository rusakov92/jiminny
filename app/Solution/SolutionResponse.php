<?php

declare(strict_types = 1);

namespace Jiminny\Solution;

use Illuminate\Http\JsonResponse;

/**
 * Class SolutionResponse.
 */
class SolutionResponse extends JsonResponse
{
    public function __construct(
        AudioSilenceIterator $user,
        AudioSilenceIterator $customer,
        $status = 200,
        $headers = [],
        $options = 0
    ) {
        $userActiveAudio = $user->getActiveAudioData();
        $customerActiveAudio = $customer->getActiveAudioData();

        parent::__construct([
            'longest_user_monologue' => $userActiveAudio->getLongestMonologInSeconds(),
            'longest_customer_monologue' => $customerActiveAudio->getLongestMonologInSeconds(),
            'user_talk_percentage' => Utility::calculatePercentage($userActiveAudio->getEntireMonolog(), $user->getAudioEndMilliseconds()),
            'user' => $userActiveAudio->toPointsInSeconds(),
            'customer' => $customerActiveAudio->toPointsInSeconds(),
        ], $status, $headers, $options);
    }
}
