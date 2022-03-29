<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\SessionManager;

use Psr\Cache\InvalidArgumentException;

class SessionManagerFacade
{
    private SessionManager $sessionManager;

    /**
     * @param SessionManager $sessionManager
     */
    public function __construct(SessionManager $sessionManager)
    {
        $this->sessionManager = $sessionManager;
    }

    /**
     * @return Session
     */
    public function getSession(): Session
    {
        try {
            return $this->sessionManager->getSession();
        } catch (InvalidArgumentException $e) {
            return new Session();
        }
    }

    /**
     * @param Session $session
     * @return void
     */
    public function setSession(Session $session): void
    {
        try {
            $this->sessionManager->setSession($session);
        } catch (InvalidArgumentException $e) {
        }
    }

    /**
     * @return int
     */
    public function getProductIndex(): int
    {
        $session = $this->getSession();

        return $session->getProductIndex();
    }

    /**
     * @param int $productIndex
     * @return self
     */
    public function setProductIndex(int $productIndex): self
    {
        $session = $this->getSession();
        $session->setProductIndex($productIndex);
        $this->setSession($session);

        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryIndex(): int
    {
        $session = $this->getSession();

        return $session->getCategoryIndex();
    }

    /**
     * @param int $categoryIndex
     * @return self
     */
    public function setCategoryIndex(int $categoryIndex): self
    {
        $session = $this->getSession();
        $session->setCategoryIndex($categoryIndex);
        $this->setSession($session);

        return $this;
    }
}