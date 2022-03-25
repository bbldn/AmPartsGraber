<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\SessionManager;

use Psr\Cache\InvalidArgumentException;
use Psr\Cache\CacheItemInterface as CacheItem;
use Symfony\Component\Cache\Adapter\FilesystemAdapter as CachePool;

class SessionManager
{
    private const KEY = 'project:parse:product:list:all:session';

    private CachePool $cachePool;

    public function __construct()
    {
        $this->cachePool = new CachePool();
    }

    /**
     * @return Session
     * @throws InvalidArgumentException
     */
    public function getSession(): Session
    {
        /** @var CacheItem $sessionItem */
        $sessionItem = $this->cachePool->getItem(self::KEY);
        if (true === $sessionItem->isHit()) {
            $session = unserialize((string)$sessionItem->get());
            if (true === is_a($session, Session::class)) {
                return $session;
            }
        }

        $session = new Session();
        $sessionItem->set(serialize($session));
        $this->cachePool->save($sessionItem);

        return $session;
    }

    /**
     * @param Session $session
     * @return void
     * @throws InvalidArgumentException
     */
    public function setSession(Session $session): void
    {
        /** @var CacheItem $sessionItem */
        $sessionItem = $this->cachePool->getItem(self::KEY);
        $sessionItem->set(serialize($session));
        $this->cachePool->save($sessionItem);
    }
}