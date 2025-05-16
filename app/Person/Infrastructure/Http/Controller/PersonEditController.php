<?php

declare(strict_types=1);

namespace App\Person\Infrastructure\Http\Controller;

use App\Person\Application\PersonFacade;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class PersonEditController extends Controller
{
    public function __construct(
        private readonly PersonFacade $facade
    ) {
    }

    public function edit(\App\Person\Application\Model\PersonEditRequest $request): JsonResponse
    {
        return new JsonResponse(
            $this->facade->edit($request)->toArray(),
            200,
            [],
            JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
        );
    }
}
