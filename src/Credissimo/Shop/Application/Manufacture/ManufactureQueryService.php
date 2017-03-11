<?php

namespace Credissimo\Shop\Application\Manufacture;

use Credissimo\Shop\Domain\Model\Manufacture;
use Credissimo\Shop\Domain\Repository\ManufactureRepository;

class ManufactureQueryService
{
    /** @var ManufactureRepository */
    private $manufactureRepository;

    public function __construct(ManufactureRepository $manufactureRepository)
    {
        $this->manufactureRepository = $manufactureRepository;
    }

    /**
     * @return Manufacture[]
     */
    public function getManufactures()
    {
        return $this->manufactureRepository->findAll();
    }

    /**
     * @return array
     */
    public function getManufacturesAsOptionList()
    {
        $manufactures = $this->getManufactures();

        return array_map(function (Manufacture $manufacture) {
            return [$manufacture->getId() => $manufacture->getName()];
        }, $manufactures);
    }

    /**
     * @param $id
     *
     * @return Manufacture
     */
    public function getManufacture($id)
    {
        return $this->manufactureRepository->finsOneById($id);
    }
}
