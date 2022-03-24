<?php

namespace App\Domain\Graber\Domain\DTO;

class Category
{
    private ?string $url = null;

    private ?string $name = null;

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
}