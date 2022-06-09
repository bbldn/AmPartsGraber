<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductSaver;

use App\Domain\Graber\Domain\DTO\Product as ProductDTO;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Domain\Common\Domain\Entity\Base\Graber\Product as ProductEntity;
use App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductSaver\Repository\ProductRepository;

class Saver
{
    private EntityManager $entityManagerGraber;

    private ProductRepository $productRepository;

    /**
     * @param EntityManager $entityManagerGraber
     * @param ProductRepository $productRepository
     */
    public function __construct(
        EntityManager $entityManagerGraber,
        ProductRepository $productRepository
    )
    {
        $this->entityManagerGraber = $entityManagerGraber;
        $this->productRepository = $productRepository;
    }

    /**
     * @param ProductDTO $productDTO
     * @return ProductEntity|null
     */
    public function save(ProductDTO $productDTO): ?ProductEntity
    {
        $code = (string)$productDTO->getCode();
        $product = $this->productRepository->findOneByCode($code);
        if (null === $product) {
            $product = new ProductEntity();
        }

        $product->setCode($code);
        $product->setUrl($productDTO->getUrl());
        $product->setName($productDTO->getName());
        $product->setPrice($productDTO->getPrice() ?? 0);
        $product->setImageUrl($productDTO->getImageUrl());
        $product->setCategoryUrl($productDTO->getCategoryUrl());

        $description = $productDTO->getDescription();
        if (null !== $description) {
            $product->setDescription(trim($description));
        }

        $this->entityManagerGraber->persist($product);

        return $product;
    }
}