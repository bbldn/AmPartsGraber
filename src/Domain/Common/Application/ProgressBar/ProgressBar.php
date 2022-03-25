<?php

namespace App\Domain\Common\Application\ProgressBar;

use Symfony\Component\Console\Output\OutputInterface as Output;

class ProgressBar
{
    private int $productTotal = 0;

    private int $categoryTotal = 0;

    private int $productCurrent = 0;

    private int $categoryCurrent = 0;

    private Output $output;

    /**
     * @param Output $output
     */
    public function __construct(Output $output)
    {
        $this->output = $output;
    }

    /**
     * @param int $productTotal
     */
    public function setProductTotal(int $productTotal): void
    {
        $this->productTotal = $productTotal;
        $this->output();
    }

    /**
     * @param int $categoryTotal
     */
    public function setCategoryTotal(int $categoryTotal): void
    {
        $this->categoryTotal = $categoryTotal;
        $this->output();
    }

    /**
     * @param int $productCurrent
     */
    public function setProductCurrent(int $productCurrent): void
    {
        $this->productCurrent = $productCurrent;
        $this->output();
    }

    /**
     * @param int $categoryCurrent
     */
    public function setCategoryCurrent(int $categoryCurrent): void
    {
        $this->categoryCurrent = $categoryCurrent;
        $this->output();
    }

    /**
     * @return void
     */
    private function output(): void
    {
        $message = "$this->categoryCurrent/$this->categoryTotal\t$this->productCurrent/$this->productTotal";
        $this->output->writeln($message);
    }
}