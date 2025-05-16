<?php

declare(strict_types=1);

namespace App\Person\Infrastructure\Repository;

use App\Person\Application\Model\PersonCache;
use App\Person\Domain\Repository\PersonRepository;
use App\Person\Infrastructure\Entity\Person;
use App\Person\Infrastructure\Mapper\PersonEntityMapper;
use App\Person\Application\Model\PersonCreateContract;
use App\Person\Application\Model\PersonDeleteContract;
use App\Person\Application\Model\PersonDetailsContract;
use App\Person\Application\Model\PersonEditContract;
use App\Person\Application\Model\PersonListContract;
use App\Person\Application\Model\PersonReadContract;
use App\Person\Infrastructure\Event\PersonCreated;
use App\Person\Infrastructure\Event\PersonDeleted;
use App\Person\Infrastructure\Event\PersonEdited;
use Illuminate\Support\Facades\Cache;

readonly class PersonRepositoryImpl implements PersonRepository
{
    public function __construct(
        private PersonEntityRepository $entityRepository,
        private PersonEntityMapper $entityMapper,
        private Cache $cache,
        private PersonCache $timezoneCache
    ) {
    }

    /**
     * @throws \Exception
     */
    public function create(PersonCreateContract $create): PersonReadContract
    {
        $entity = $this->entityMapper->mapCreateModelToEntity($create);
        $this->entityRepository->create(
            $entity
        );

        $readModel = $this->entityMapper->mapEntityToReadModel($entity);
        event(new PersonCreated($readModel));
        $this->updateSingleCache($readModel);
        return $readModel;
    }

    public function edit(PersonEditContract $edit): PersonReadContract
    {
        $entity = $this->entityMapper->mapEditModelToEntity($edit);
        $this->entityRepository->details($entity);
        $this->entityRepository->edit(
            $entity
        );

        $readModel = $this->entityMapper->mapEntityToReadModel($entity);
        event(new PersonEdited($readModel));
        $this->updateSingleCache($readModel);

        return $readModel;
    }

    public function details(PersonDetailsContract $details): PersonReadContract
    {
        $readModel = $this->entityMapper->mapEntityToReadModel(
            $this->entityRepository->details(
                $this->entityMapper->mapDetailsModelToEntity($details)
            )
        );

        $this->updateSingleCache($readModel);

        return $readModel;
    }

    public function delete(PersonDeleteContract $delete): void
    {
        $entity = $this->entityMapper->mapDeleteModelToEntity($delete);
        $entityRead = $this->entityRepository->details($entity);
        $this->entityRepository->delete(
            $entity
        );
        event(new PersonDeleted($this->entityMapper->mapEntityToReadModel($entityRead)));
        $this->deleteCache($delete);
    }

    public function list(PersonListContract $list): void
    {
        $data = $this->entityRepository->list();
        foreach ($data as $item) {
            $readModel = $this->entityMapper->mapEntityToReadModel(new Person((array)$item));
            $list->addItem($readModel);
            $this->updateSingleCache($readModel);
        }
        $this->updateListCache($list);
    }

    private function updateSingleCache(PersonReadContract $readModel): void
    {
        $this->cache::put(
            $this->timezoneCache->prepareCacheKey($readModel),
            json_encode($readModel->toArray())
        );
        $this->deleteListCache();
    }

    private function updateListCache(PersonListContract $listModel): void
    {
        $this->cache::put(
            $this->timezoneCache->prepareCacheKey(),
            json_encode($listModel->toArray())
        );
    }

    private function deleteCache(PersonDeleteContract $delete): void
    {
        $this->cache::delete($this->timezoneCache->prepareCacheKey($delete));
        $this->deleteListCache();
    }

    private function deleteListCache(): void
    {
        $this->cache::delete($this->timezoneCache->prepareCacheListKey());
    }
}
