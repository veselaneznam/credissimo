<?php

namespace Credissimo\Shop\Domain\Repository;

use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Model\Manufacture;
use Credissimo\Shop\Domain\Model\Product;
use Credissimo\User\Domain\Model\User;

interface ProductRepository
{
    /**
     * @return Product[]
     */
    public function findAllActive();

    /**
     * @param User $user
     *
     * @return Product[]
     */
    public function findByUser(User $user);

    /**
     * @param Category $category
     *
     * @return Product[]
     */
    public function findByCategory(Category $category);

    /**
     * @param Manufacture $manufacture
     *
     * @return Product[]
     */
    public function findByManufacture(Manufacture $manufacture);

    /**
     * @param int $id
     *
     * @return Product
     */
    public function findOneById($id);

    /**
     * @param Product $product
     */
    public function save(Product $product);

    /**
     * @param Product $product
     */
    public function delete(Product $product);

    public function update(Product $product);

    /**
     * @return Product[]
     */
    public function findAllDeleted();

    /**
     * @param array $data
     *
     * @return Product[]
     */
    public function findByCriteria(array $data);
}
