<?php

namespace Credissimo\Shop\Application\Product;

class UpdateProductCommand
{
    /** @var ProductRepresentation */
    public $productRepresentation;

    /**
     * @param ProductRepresentation $productRepresentation
     */
    public function __construct(ProductRepresentation $productRepresentation)
    {
        $this->productRepresentation = $productRepresentation;
    }
}
