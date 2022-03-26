<?php

namespace App\Domain\Common\Domain\Entity\Base\Graber;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Graber\CategoryRepository;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 * @ORM\Table(name="`categories`", indexes={@ORM\Index(name="url_idx", columns={"url"})})
 */
class Category
{
    /**
     * Идентификатор
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`id`", options={"unsigned":true})
     */
    private ?int $id = null;

    /**
     * Ссылка
     * @ORM\Column(type="string", name="`url`", length=512)
     */
    private ?string $url = null;

    /**
     * Ссылка
     * @ORM\Column(type="string", name="`name`", length=512)
     */
    private ?string $name = null;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class)
     * @ORM\JoinColumn(name="`parent_id`", referencedColumnName="`id`")
     */
    private ?Category $parent = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Category
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return Category
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

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
     * @return Category
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Category|null
     */
    public function getParent(): ?Category
    {
        return $this->parent;
    }

    /**
     * @param Category|null $parent
     * @return Category
     */
    public function setParent(?Category $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
}