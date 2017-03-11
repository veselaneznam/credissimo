<?php

namespace Credissimo\Shop\Domain\Repository;

use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Model\Manufacture;

interface CategoryRepository
{
    /**
     * @param Manufacture $manufacture
     *
     * @return Category
     */
    public function findOneByManufacture(Manufacture $manufacture);

    /**
     * @return Category[]
     */
    public function findAll();

    /**
     * @param $id
     *
     * @return Category
     */
    public function finsOneById($id);

    /**
     * @param Category $category
     */
    public function save($category);
}
