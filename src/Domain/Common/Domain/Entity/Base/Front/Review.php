<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ReviewRepository;

#[ORM\HasLifecycleCallbacks]
#[ORM\Table(name: "`oc_review`")]
#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`review_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(name: "`product_id`", referencedColumnName: "`product_id`", nullable: true)]
    private ?Product $product = null;

    #[ORM\ManyToOne(targetEntity: Customer::class)]
    #[ORM\JoinColumn(name: "`customer_id`", referencedColumnName: "`customer_id`", nullable: true)]
    private ?Customer $customer = null;

    #[ORM\Column(name: "`author`", type: Types::STRING, length: 64)]
    private ?string $author = null;

    #[ORM\Column(name: "`text`", type: Types::TEXT)]
    private ?string $text = null;

    #[ORM\Column(name: "`reply`", type: Types::TEXT)]
    private ?string $reply = null;

    #[ORM\Column(name: "`rating`", type: Types::INTEGER)]
    private ?int $rating = null;

    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["options" => true])]
    private ?bool $status = false;

    #[ORM\Column(name: "`date_added`", type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $dateAdded = null;

    #[ORM\Column(name: "`date_modified`", type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $dateModified = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Review
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
     * @return Review
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Customer|null
     */
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer|null $customer
     * @return Review
     */
    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @param string|null $author
     * @return Review
     */
    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     * @return Review
     */
    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReply(): ?string
    {
        return $this->reply;
    }

    /**
     * @param string|null $reply
     * @return Review
     */
    public function setReply(?string $reply): self
    {
        $this->reply = $reply;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getRating(): ?int
    {
        return $this->rating;
    }

    /**
     * @param int|null $rating
     * @return Review
     */
    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * @param bool|null $status
     * @return Review
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDateAdded(): ?DateTimeImmutable
    {
        return $this->dateAdded;
    }

    /**
     * @param DateTimeImmutable|null $dateAdded
     * @return Review
     */
    public function setDateAdded(?DateTimeImmutable $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDateModified(): ?DateTimeImmutable
    {
        return $this->dateModified;
    }

    /**
     * @param DateTimeImmutable|null $dateModified
     * @return Review
     */
    public function setDateModified(?DateTimeImmutable $dateModified): self
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    #[ORM\PreUpdate]
    #[ORM\PrePersist]
    public function updatedTimestamps(): void
    {
        $this->setDateModified(new DateTimeImmutable());

        if (null === $this->getDateAdded()) {
            $this->setDateAdded(new DateTimeImmutable());
        }
    }
}