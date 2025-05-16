<?php

declare(strict_types=1);

namespace App\Person\Infrastructure\Http\Controller;

use App\Person\Application\Model\PersonDetailsRequest;
use App\Person\Application\PersonFacade;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class PersonDetailsController extends Controller
{
    public function __construct(
        private readonly PersonFacade $facade,
    ) {
    }

    public function details(PersonDetailsRequest $request): JsonResponse
    {
        $data = $this->facade->details($request)->toArray();

        return new JsonResponse(
            $data,
            200,
            [],
            JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
        );
    }
}
