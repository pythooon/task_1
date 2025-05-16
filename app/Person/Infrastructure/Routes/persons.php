<?php

declare(strict_types=1);

use App\Person\Infrastructure\Http\Controller\PersonCreateController;
use App\Person\Infrastructure\Http\Controller\PersonDeleteController;
use App\Person\Infrastructure\Http\Controller\PersonDetailsController;
use App\Person\Infrastructure\Http\Controller\PersonEditController;
use App\Person\Infrastructure\Http\Controller\PersonListController;
use Illuminate\Support\Facades\Route;

Route::post('persons', [PersonCreateController::class, 'create'])->name('api.persons.create');
Route::put('persons/{personId}', [PersonEditController::class, 'edit'])->name('api.persons.edit');
Route::delete('persons/{personId}', [PersonDeleteController::class, 'delete'])->name(
    'api.persons.delete'
);
Route::get('persons/{personId}', [PersonDetailsController::class, 'details'])->name(
    'api.persons.details'
);
Route::get('persons', [PersonListController::class, 'list'])->name('api.persons.list');
