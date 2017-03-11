<?php

namespace Credissimo\Shop\Application\Product;

use Credissimo\Shop\Domain\Model\Product;

class DeleteProductCommand
{
    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
}
