<?php

namespace App\Domain\Graber\Application\CommandHandler\DownloadProductImageListAllHandler;

use App\Domain\Graber\Domain\Exception\ParseException;
use App\Domain\Graber\Application\Command\DownloadProductImageListAll;
use App\Domain\Common\Infrastructure\Repository\Base\Graber\ProductRepository;
use App\Domain\Graber\Application\CommandHandler\DownloadProductImageListAllHandler\ImageDownloader\Downloader as ImageDownloader;

class CommandHandler
{
    private ImageDownloader $imageDownloader;

    private ProductRepository $productRepository;

    /**
     * @param ImageDownloader $imageDownloader
     * @param ProductRepository $productRepository
     */
    public function __construct(
        ImageDownloader $imageDownloader,
        ProductRepository $productRepository
    )
    {
        $this->imageDownloader = $imageDownloader;
        $this->productRepository = $productRepository;
    }

    /**
     * @param DownloadProductImageListAll $command
     * @return void
     */
    public function __invoke(DownloadProductImageListAll $command): void
    {
        $onStart = $command->getOnStart();
        $onSetProgress = $command->getOnSetProgress();

        $productList = $this->productRepository->findAll();
        if (null !== $onStart) {
            call_user_func($onStart, count($productList));
        }

        foreach ($productList as $index => $product) {
            if (null !== $onSetProgress) {
                call_user_func($onSetProgress, $index);
            }

            try {
                $this->imageDownloader->downloadAndSave($product);
            } catch (ParseException) {
                continue;
            }
        }
    }
}