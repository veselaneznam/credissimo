<?php

namespace Credissimo\Shop\Infrastructure\Repository\Doctrine\ORM;

use Credissimo\Shop\Domain\Model\Attribute;
use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Repository\AttributeRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineAttributeRepository extends EntityRepository implements AttributeRepository
{
    /**
     * {@inheritdoc}
     */
    public function findAllByCategory(Category $category)
    {
        return parent::findBy(['category' => $category]);
    }

    /**
     * @param Attribute $attribute
     */
    public function save(Attribute $attribute)
    {
        $this->getEntityManager()->persist($attribute);
        $this->getEntityManager()->flush($attribute);
    }
}
