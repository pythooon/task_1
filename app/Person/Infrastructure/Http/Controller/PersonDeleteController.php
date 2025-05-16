<?php

declare(strict_types=1);

namespace App\Person\Infrastructure\Http\Controller;

use App\Person\Application\Model\PersonDeleteRequest;
use App\Person\Application\PersonFacade;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class PersonDeleteController extends Controller
{
    public function __construct(
        private readonly PersonFacade $facade
    ) {
    }

    public function delete(PersonDeleteRequest $request): JsonResponse
    {
        $this->facade->delete($request);

        return new JsonResponse(
            null,
            200,
            [],
            JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
        );
    }
}
