<?php

namespace Credissimo\Shop\Infrastructure\Repository\Doctrine\ORM;

use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Model\Manufacture;
use Credissimo\Shop\Domain\Repository\AttributeRepository;
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
}
