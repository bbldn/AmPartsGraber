<?php

$path = dirname(__DIR__) . '/var/cache/prod/App_KernelProdContainer.preload.php';

if (true === file_exists($path)) {
    require $path;
}