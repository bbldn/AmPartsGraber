<?php

namespace App\Domain\Common\Application\MultipleEntityManager;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;

class EntityManagerImpl implements EntityManager
{
    private ObjectManager $objectManagerGraber;

    private ObjectManager $objectManagerFront;

    /**
     * @param ManagerRegistry $managerRegistry
     */
    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->objectManagerFront = $managerRegistry->getManager('front');
        $this->objectManagerGraber = $managerRegistry->getManager('graber');
    }

    /** START ALL */

    /**
     * @return void
     */
    public function flushAll(): void
    {
        $this->flushGraber();
        $this->flushFront();
    }

    /**
     * @return void
     */
    public function clearAll(): void
    {
        $this->clearGraber();
        $this->clearFront();
    }

    /** END ALL */

    /** START FRONT */

    /**
     * @return void
     */
    public function clearFront(): void
    {
        $this->objectManagerFront->clear();
    }

    /**
     * @param mixed $entity
     * @return void
     */
    public function removeFront($entity): void
    {
        $this->objectManagerFront->remove($entity);
    }

    /**
     * @param mixed $entity
     * @return void
     *
     * @noinspection PhpUnused
     */
    public function removeAndFlushFront($entity): void
    {
        $this->removeFront($entity);
        $this->flushFront();
    }

    /**
     * @param mixed $entity
     * @return void
     */
    public function persistFront($entity): void
    {
        $this->objectManagerFront->persist($entity);
    }

    /**
     * @return void
     */
    public function flushFront(): void
    {
        $this->objectManagerFront->flush();
    }

    /**
     * @param mixed $entity
     * @return void
     *
     * @noinspection PhpUnused
     */
    public function persistAndFlushFront($entity): void
    {
        $this->persistFront($entity);
        $this->flushFront();
    }

    /**
     * @return ObjectManager
     */
    public function getObjectManagerFront(): ObjectManager
    {
        return $this->objectManagerFront;
    }

    /** END FRONT */

    /** START BACK */

    /**
     * @return void
     */
    public function clearGraber(): void
    {
        $this->objectManagerGraber->clear();
    }

    /**
     * @param mixed $entity
     * @return void
     */
    public function removeGraber($entity): void
    {
        $this->objectManagerGraber->remove($entity);
    }

    /**
     * @param mixed $entity
     * @return void
     */
    public function persistGraber($entity): void
    {
        $this->objectManagerGraber->persist($entity);
    }

    /**
     * @param mixed $entity
     * @return void
     *
     * @noinspection PhpUnused
     */
    public function removeAndFlushGraber($entity): void
    {
        $this->removeGraber($entity);
        $this->flushGraber();
    }

    /**
     * @return void
     */
    public function flushGraber(): void
    {
        $this->objectManagerGraber->flush();
    }

    /**
     * @param mixed $entity
     * @return void
     *
     * @noinspection PhpUnused
     */
    public function persistAndFlushGraber($entity): void
    {
        $this->persistGraber($entity);
        $this->flushGraber();
    }

    /**
     * @return ObjectManager
     */
    public function getObjectManagerGraber(): ObjectManager
    {
        return $this->objectManagerGraber;
    }

    /** END BACK */
}