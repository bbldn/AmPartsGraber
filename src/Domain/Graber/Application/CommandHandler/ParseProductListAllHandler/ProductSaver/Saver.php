<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductSaver;

use App\Domain\Graber\Domain\DTO\Product as ProductDTO;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Domain\Graber\Domain\Entity\Product as ProductEntity;
use App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductSaver\Repository\ProductRepository;

class Saver
{
    private EntityManager $entityManager;

    private ProductRepository $productRepository;

    /**
     * @param EntityManager $entityManager
     * @param ProductRepository $productRepository
     */
    public function __construct(
        EntityManager $entityManager,
        ProductRepository $productRepository
    )
    {
        $this->entityManager = $entityManager;
        $this->productRepository = $productRepository;
    }

    /**
     * @param ProductDTO $productDTO
     * @return ProductEntity|null
     */
    public function save(ProductDTO $productDTO): ?ProductEntity
    {
        $code = $productDTO->getCode();
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
        $product->setDescription($productDTO->getDescription());

        $this->entityManager->persist($product);

        return $product;
    }
}