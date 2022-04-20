<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductPriceRepository;

#[ORM\Table(name: "`oc_product_price`")]
#[ORM\Entity(repositoryClass: ProductPriceRepository::class)]
class ProductPrice
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(name: "`product_id`", referencedColumnName: "`product_id`")]
    private ?Product $product = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CustomerGroup::class)]
    #[ORM\JoinColumn(name: "`customer_group_id`", referencedColumnName: "`customer_group_id`")]
    private ?CustomerGroup $customerGroup = null;

    #[ORM\ManyToOne(targetEntity: Currency::class)]
    #[ORM\JoinColumn(name: "`currency_id`", referencedColumnName: "`currency_id`", nullable: true)]
    private ?Currency $currency = null;

    #[ORM\Column(name: "`price`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,4)')]
    private ?float $price = 0.0;

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     * @return ProductPrice
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return CustomerGroup|null
     */
    public function getCustomerGroup(): ?CustomerGroup
    {
        return $this->customerGroup;
    }

    /**
     * @param CustomerGroup|null $customerGroup
     * @return ProductPrice
     */
    public function setCustomerGroup(?CustomerGroup $customerGroup): self
    {
        $this->customerGroup = $customerGroup;

        return $this;
    }

    /**
     * @return Currency|null
     */
    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    /**
     * @param Currency|null $currency
     * @return ProductPrice
     */
    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return ProductPrice
     */
    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }
}