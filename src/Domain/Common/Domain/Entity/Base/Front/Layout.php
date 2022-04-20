<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\LayoutRepository;

#[ORM\Table(name: "`oc_layout`")]
#[ORM\Entity(repositoryClass: LayoutRepository::class)]
class Layout
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`layout_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "`name`", type: Types::STRING, length: 64)]
    private ?string $name = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Layout
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Layout
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}