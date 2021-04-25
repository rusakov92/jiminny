<?php

declare(strict_types = 1);

namespace Jiminny\Solution\Controller;

use Illuminate\Http\JsonResponse;
use Jiminny\Http\Controllers\Controller;
use Jiminny\Solution\UserAudio\UserAudioService;

use function response;

/**
 * Class SolutionController.
 */
class SolutionController extends Controller
{
    protected UserAudioService $userAudioService;

    public function __construct(UserAudioService $userAudioService)
    {
        $this->userAudioService = $userAudioService;
    }

    public function calculateActiveAudioDuration(): JsonResponse
    {
        return response()->json(['asd']);
    }
}
