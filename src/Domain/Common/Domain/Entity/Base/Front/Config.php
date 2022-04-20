<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ConfigRepository;

#[ORM\Table(name: "`synchronizer_configs`")]
#[ORM\Entity(repositoryClass: ConfigRepository::class)]
class Config
{
    #[ORM\Id]
    #[ORM\Column(name: "`key`", type: Types::STRING, length: 255)]
    private ?string $key = null;

    #[ORM\Column(name: "`value`", type: Types::TEXT, nullable: true)]
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
    public function setKey(?string $key): self
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
    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }
}