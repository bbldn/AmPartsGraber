<?php

namespace App\Domain\Graber\Application\CommandHandler\DownloadProductImageListAllHandler\ImageDownloader;

use App\Domain\Graber\Domain\Exception\ParseException;
use App\Domain\Common\Domain\Entity\Base\Graber\Product;
use Symfony\Component\HttpKernel\KernelInterface as Kernel;

class Downloader
{
    private Kernel $kernel;

    /**
     * @param Kernel $kernel
     */
    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @param string $url
     * @return string
     * @throws ParseException
     */
    private function getImage(string $url): string
    {
        $image = @file_get_contents("https://am-parts.ru$url");
        if (false === $image) {
            throw new ParseException('Error');
        }

        return $image;
    }

    /**
     * @param string $image
     * @param string $fileName
     * @return void
     */
    private function saveImage(string $image, string $fileName): void
    {
        $path = "{$this->kernel->getProjectDir()}/public/images/$fileName";
        file_put_contents($path, $image);
    }

    /**
     * @param Product $product
     * @return void
     * @throws ParseException
     */
    public function downloadAndSave(Product $product): void
    {
        $imageUrl = $product->getImageUrl();
        if (null === $imageUrl) {
            return;
        }

        $image = $this->getImage($imageUrl);
        $this->saveImage($image, basename($imageUrl));
    }
}