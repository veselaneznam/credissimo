<?php

namespace Credissimo\Shop\Domain\Repository;

use Credissimo\Shop\Domain\Model\Attribute;
use Credissimo\Shop\Domain\Model\Category;

interface AttributeRepository
{
    /**
     * @param Category $category
     *
     * @return Attribute
     */
    public function findAllByCategory(Category $category);
}
