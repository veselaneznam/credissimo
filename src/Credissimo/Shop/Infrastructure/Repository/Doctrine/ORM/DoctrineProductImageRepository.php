<?php

namespace Credissimo\Shop\Infrastructure\Repository\Doctrine\ORM;

use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Model\Product;
use Credissimo\Shop\Domain\Model\ProductImage;
use Credissimo\Shop\Domain\Repository\AttributeRepository;
use Credissimo\Shop\Domain\Repository\ProductImageRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineProductImageRepository extends EntityRepository implements ProductImageRepository
{
    /**
     * {@inheritdoc}
     */
    public function findByProduct(Product $product)
    {
        return parent::findBy(['product' => $product]);
    }
}
