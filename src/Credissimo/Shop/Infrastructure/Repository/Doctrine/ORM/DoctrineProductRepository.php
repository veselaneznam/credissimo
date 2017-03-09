<?php

namespace Credissimo\Shop\Infrastructure\Repository\Doctrine\ORM;

use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Model\Manufacture;
use Credissimo\Shop\Domain\Model\Product;
use Credissimo\Shop\Domain\Repository\ProductRepository;
use Credissimo\User\Domain\Model\User;
use Doctrine\ORM\EntityRepository;

class DoctrineProductRepository extends EntityRepository implements ProductRepository
{

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return parent::findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function findByUser(User $user)
    {
        return parent::findBy(['user' => $user]);
    }

    /**
     * {@inheritdoc}
     */
    public function findByCategory(Category $category)
    {
        return parent::findBy(['category' => $category]);
    }

    /**
     * {@inheritdoc}
     */
    public function findByManufacture(Manufacture $manufacture)
    {
        return parent::findBy(['manufacture' => $manufacture]);
    }

    /**
     * {@inheritdoc}
     */
    public function findOneById($id)
    {
        return parent::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function save(Product $product)
    {
        $this->getEntityManager()->persist($product);
        $this->getEntityManager()->flush($product);
    }
}
