<?php

namespace Credissimo\Shop\Domain\Repository;

use Credissimo\Shop\Domain\Model\Product;
use Credissimo\Shop\Domain\Model\ProductImage;

interface ProductImageRepository
{
    /**
     * @param Product $product
     *
     * @return ProductImage
     */
    public function findByProduct(Product $product);
}
