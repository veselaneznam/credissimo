<?php

namespace Credissimo\Shop\Application;

use Credissimo\Shop\Domain\Model\Product;
use Credissimo\Shop\Domain\Repository\ProductRepository;

class ProductQueryService
{
    /** @var ProductRepository */
    private $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->productRepository->findAll();
    }

    public function getProduct($productId)
    {
        return $this->productRepository->findOneById($productId);
    }
}
