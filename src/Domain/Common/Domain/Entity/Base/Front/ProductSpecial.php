<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductSpecialRepository;

#[ORM\Table(name: "`oc_product_special`")]
#[ORM\Entity(repositoryClass: ProductSpecialRepository::class)]
class ProductSpecial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`product_special_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(name: "`product_id`", referencedColumnName: "`product_id`", nullable: true)]
    private ?Product $product = null;

    #[ORM\ManyToOne(targetEntity: CustomerGroup::class)]
    #[ORM\JoinColumn(name: "`customer_group_id`", referencedColumnName: "`customer_group_id`", nullable: true)]
    private ?CustomerGroup $customerGroup = null;

    #[ORM\Column(name: "`priority`", type: Types::INTEGER, options: ["default" => 1])]
    private ?int $priority = 1;

    #[ORM\Column(name: "`price`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,4)', options: ["default" => 0])]
    private ?float $price = 0.0;

    #[ORM\Column(name: "`date_start`", type: Types::DATE_IMMUTABLE)]
    private ?DateTimeImmutable $dateStart = null;

    #[ORM\Column(name: "`date_end`", type: Types::DATE_IMMUTABLE)]
    private ?DateTimeImmutable $dateEnd = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return ProductSpecial
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     * @return ProductSpecial
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
     * @return ProductSpecial
     */
    public function setCustomerGroup(?CustomerGroup $customerGroup): self
    {
        $this->customerGroup = $customerGroup;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPriority(): ?int
    {
        return $this->priority;
    }

    /**
     * @param int|null $priority
     * @return ProductSpecial
     */
    public function setPriority(?int $priority): self
    {
        $this->priority = $priority;

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
     * @return ProductSpecial
     */
    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDateStart(): ?DateTimeImmutable
    {
        return $this->dateStart;
    }

    /**
     * @param DateTimeImmutable|null $dateStart
     * @return ProductSpecial
     */
    public function setDateStart(?DateTimeImmutable $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDateEnd(): ?DateTimeImmutable
    {
        return $this->dateEnd;
    }

    /**
     * @param DateTimeImmutable|null $dateEnd
     * @return ProductSpecial
     */
    public function setDateEnd(?DateTimeImmutable $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }
}