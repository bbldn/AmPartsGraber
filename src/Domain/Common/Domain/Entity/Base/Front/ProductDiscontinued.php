<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductDiscontinuedRepository;

#[ORM\Table(name: "`oc_product_discontinued`")]
#[ORM\Entity(repositoryClass: ProductDiscontinuedRepository::class)]
class ProductDiscontinued
{
    #[ORM\Id]
    #[ORM\JoinColumn(name: "`product_id`", referencedColumnName: "`product_id`")]
    #[ORM\OneToOne(targetEntity: Product::class, inversedBy: "productDiscontinued", cascade: ["persist"])]
    private ?Product $product = null;

    #[ORM\Column(name: "`redirect_url`", type: Types::STRING, length: 255, nullable: true)]
    private ?string $redirectUrl = null;

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     * @return ProductDiscontinued
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }

    /**
     * @param string|null $redirectUrl
     * @return ProductDiscontinued
     */
    public function setRedirectUrl(?string $redirectUrl): self
    {
        $this->redirectUrl = $redirectUrl;

        return $this;
    }
}