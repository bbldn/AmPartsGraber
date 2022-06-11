<?php

namespace App\Domain\Film\Application\QueryHandler\ActressListAllJSON;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Psr\Cache\InvalidArgumentException as CacheInvalidArgumentException;
use App\Domain\Common\Application\EntityToArrayHydrator\Hydrator as EntityToArrayHydrator;
use App\Domain\Film\Application\QueryHandler\ActressListAllJSON\Repository\Film\ActressRepository;

class Handler
{
    private ActressRepository $actressRepository;

    private EntityToArrayHydrator $entityToArrayHydrator;

    /**
     * @param ActressRepository $actressRepository
     * @param EntityToArrayHydrator $entityToArrayHydrator
     */
    public function __construct(
        ActressRepository $actressRepository,
        EntityToArrayHydrator $entityToArrayHydrator
    )
    {
        $this->actressRepository = $actressRepository;
        $this->entityToArrayHydrator = $entityToArrayHydrator;
    }

    /**
     * @return string
     * @throws CacheInvalidArgumentException
     */
    public function __invoke(): string
    {
        $cacheHandler = new FilesystemAdapter();

        return $cacheHandler->get('actress_list_all', function (): string {
            $actressList = $this->actressRepository->findAll();
            $actressListHydrated = $this->entityToArrayHydrator->hydrateArray($actressList);

            $json = json_encode($actressListHydrated);
            if (false !== $json) {
                return $json;
            }

            return '[]';
        });
    }
}