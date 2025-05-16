<?php

return [
    App\Providers\AppServiceProvider::class,
    \App\Person\Infrastructure\Provider\PersonServiceProvider::class,
    \App\Person\Infrastructure\Provider\PersonRouteServiceProvider::class
];
