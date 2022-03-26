<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ConfigRepository;

/**
 * @ORM\Table(name="`synchronizer_configs`")
 * @ORM\Entity(repositoryClass=ConfigRepository::class)
 */
class Config
{
    /**
     * Поле (ключ)
     * @ORM\Id()
     * @ORM\Column(type="string", name="`key`", length=255)
     */
    private ?string $key = null;

    /**
     * Комментарий
     * @ORM\Column(type="text", name="`value`", nullable=true)
     */
    private ?string $value = null;

    /**
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param string|null $key
     * @return Config
     */
    public function setKey(?string $key): Config
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     * @return Config
     */
    public function setValue(?string $value): Config
    {
        $this->value = $value;

        return $this;
    }
}