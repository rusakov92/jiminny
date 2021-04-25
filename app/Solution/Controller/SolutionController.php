<?php

declare(strict_types = 1);

namespace Jiminny\Solution\Controller;

use Illuminate\Http\JsonResponse;
use Jiminny\Http\Controllers\Controller;
use Jiminny\Solution\CustomerAudio\CustomerAudioService;
use Jiminny\Solution\SolutionResponse;
use Jiminny\Solution\UserAudio\UserAudioService;

/**
 * Class SolutionController solves the jiminny task.
 */
class SolutionController extends Controller
{
    private UserAudioService $userAudioService;
    private CustomerAudioService $customerAudioService;

    public function __construct(UserAudioService $userAudioService, CustomerAudioService $customerAudioService)
    {
        $this->userAudioService = $userAudioService;
        $this->customerAudioService = $customerAudioService;
    }

    public function calculateActiveAudioDuration(): JsonResponse
    {
        $userData = $this->userAudioService->getAudioSilenceData();
        $customerData = $this->customerAudioService->getAudioSilenceData();

        return new SolutionResponse($userData, $customerData);
    }
}
