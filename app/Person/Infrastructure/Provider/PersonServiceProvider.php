<?php

declare(strict_types=1);

namespace App\Person\Infrastructure\Provider;

use App\Person\Application\PersonFacade;
use App\Person\Domain\PersonFacadeImpl;
use App\Person\Domain\Repository\PersonRepository;
use App\Person\Infrastructure\Console\PersonConsumer;
use App\Person\Infrastructure\Repository\PersonEntityRepository;
use App\Person\Infrastructure\Repository\PersonEntityRepositoryImpl;
use App\Person\Infrastructure\Repository\PersonRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class PersonServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(PersonFacade::class, PersonFacadeImpl::class);
        $this->app->bind(PersonRepository::class, PersonRepositoryImpl::class);
        $this->app->bind(PersonEntityRepository::class, PersonEntityRepositoryImpl::class);
    }
}
