<?php

namespace Credissimo\Shop\Domain\Repository;

use Credissimo\Shop\Domain\Model\Manufacture;

interface ManufactureRepository
{
    /**
     * @return Manufacture[]
     */
    public function findAll();
}
