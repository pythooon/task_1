<?php

declare(strict_types=1);

namespace App\Person\Infrastructure\Provider;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class PersonRouteServiceProvider extends RouteServiceProvider
{
    public function boot(): void
    {
        parent::boot();
        $this->routes(
            function () {
                Route::middleware('api')
                    ->namespace($this->namespace)
                    ->group(base_path('app/Person/Infrastructure/Routes/persons.php'));
            }
        );
    }
}
