<?php

namespace App\Domain\Film\Application\QueryHandler\ActressListAll;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Psr\Cache\InvalidArgumentException as CacheInvalidArgumentException;
use App\Domain\Common\Application\EntityToArrayHydrator\Hydrator as EntityToArrayHydrator;
use App\Domain\Film\Application\QueryHandler\ActressListAll\Repository\Film\ActressRepository;

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
     * @return array
     * @throws CacheInvalidArgumentException
     */
    public function __invoke(): array
    {
        $cacheHandler = new FilesystemAdapter();

        $json = $cacheHandler->get('actress_list_all', function (): string {
            $actressList = $this->actressRepository->findAll();
            $actressListHydrated = $this->entityToArrayHydrator->hydrateArray($actressList);

            $json = json_encode($actressListHydrated);
            if (false !== $json) {
                return $json;
            }

            return '[]';
        });

        $actressListHydrated = json_decode($json, true);
        if (null !== $actressListHydrated && false !== $actressListHydrated) {
            return $actressListHydrated;
        }

        return [];
    }
}