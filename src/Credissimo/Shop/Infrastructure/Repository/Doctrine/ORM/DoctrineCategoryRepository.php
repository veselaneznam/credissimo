<?php

namespace Credissimo\Shop\Infrastructure\Repository\Doctrine\ORM;

use Credissimo\Shop\Domain\Model\Manufacture;
use Credissimo\Shop\Domain\Repository\CategoryRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineCategoryRepository extends EntityRepository implements CategoryRepository
{

    /**
     * {@inheritdoc]
     */
    public function findOneByManufacture(Manufacture $manufacture)
    {
        return parent::findBy(['manufacture' => $manufacture]);
    }

    /**
     * {@inheritdoc}
     */
    public function finsOneById($id)
    {
        return parent::findOneBy(['id' => $id]);
    }

    /**
     * {@inheritdoc}
     */
    public function save($category)
    {
        $this->getEntityManager()->persist($category);
        $this->getEntityManager()->flush($category);
    }
}
