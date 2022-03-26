<?php

namespace App\Domain\Common\Application\MultipleEntityManager;

use Doctrine\Persistence\ObjectManager;

interface EntityManager
{
    /**
     * @return void
     */
    public function clearAll(): void;

    /**
     * @return void
     */
    public function flushAll(): void;

    /**
     * @return void
     */
    public function clearFront(): void;

    /**
     * @return void
     */
    public function flushFront(): void;

    /**
     * @param mixed $entity
     * @return void
     */
    public function removeFront($entity): void;

    /**
     * @param mixed $entity
     * @return void
     */
    public function persistFront($entity): void;

    /**
     * @param mixed $entity
     * @return void
     */
    public function removeAndFlushFront($entity): void;

    /**
     * @param mixed $entity
     * @return void
     */
    public function persistAndFlushFront($entity): void;

    /**
     * @return ObjectManager
     */
    public function getObjectManagerFront(): ObjectManager;

    /**
     * @return void
     */
    public function clearGraber(): void;

    /**
     * @return void
     */
    public function flushGraber(): void;

    /**
     * @param mixed $entity
     * @return void
     */
    public function removeGraber($entity): void;

    /**
     * @param mixed $entity
     * @return void
     */
    public function persistGraber($entity): void;

    /**
     * @param mixed $entity
     * @return void
     */
    public function removeAndFlushGraber($entity): void;

    /**
     * @param mixed $entity
     * @return void
     */
    public function persistAndFlushGraber($entity): void;

    /**
     * @return ObjectManager
     */
    public function getObjectManagerGraber(): ObjectManager;
}