<?php

namespace Credissimo\Shop\Domain\Repository;

use Credissimo\Shop\Domain\Model\Manufacture;

interface ManufactureRepository
{
    /**
     * @return Manufacture[]
     */
    public function findAll();

    /**
     * @param int $id
     *
     * @return Manufacture
     */
    public function finsOneById($id);

    /**
     * @param Manufacture $manufacture
     */
    public function save(Manufacture $manufacture);

    /**
     * @param Manufacture $manufacture
     */
    public function delete(Manufacture $manufacture);
}
