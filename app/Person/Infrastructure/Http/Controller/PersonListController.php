<?php

declare(strict_types=1);

namespace App\Person\Infrastructure\Http\Controller;

use App\Person\Application\Model\PersonListRequest;
use App\Person\Application\PersonFacade;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PersonListController extends Controller
{
    public function __construct(
        private readonly PersonFacade $facade
    ) {
    }

    public function list(PersonListRequest $request): JsonResponse
    {
        $data = $this->facade->list($request)->toArray();

        return new JsonResponse(
            $data,
            200,
            [],
            JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
        );
    }
}
