<?php

namespace Credissimo\Shop\Infrastructure\Repository\Doctrine\ORM;

use Credissimo\Shop\Domain\Model\Manufacture;
use Credissimo\Shop\Domain\Repository\ManufactureRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineManufactureRepository extends EntityRepository implements ManufactureRepository
{

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
    public function save(Manufacture $manufacture)
    {
        $this->getEntityManager()->persist($manufacture);
        $this->getEntityManager()->flush($manufacture);
    }

    /**
     * {@inheritdoc}
     */
    public function delete(Manufacture $manufacture)
    {
        $this->getEntityManager()->remove($manufacture);
        $this->getEntityManager()->flush($manufacture);
    }
}
