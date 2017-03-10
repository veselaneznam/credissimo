<?php

namespace Credissimo\Shop\Application\Product;

use Credissimo\Shop\Domain\Repository\ProductImageRepository;

class ProductImageQueryService
{
    /** @var ProductImageRepository */
    private $productImageRepository;

    public function __construct(ProductImageRepository $productImageRepository)
    {
        $this->productImageRepository = $productImageRepository;
    }
}
