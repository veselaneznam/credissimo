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
     * @return ManufactureRepresentation[]
     */
    public function getManufactures()
    {
        return $this->convertToRepresentation($this->manufactureRepository->findAll());
    }

    /**
     * @return array
     */
    public function getManufacturesAsOptionList()
    {
        $manufactures = $this->manufactureRepository->findAll();

        return array_map(function (Manufacture $manufacture) {
            return [$manufacture->getId() => $manufacture->getName()];
        }, $manufactures);
    }

    /**
     * @param $id
     *
     * @return ManufactureRepresentation
     */
    public function getManufacture($id)
    {
        return new ManufactureRepresentation($this->manufactureRepository->finsOneById($id));
    }

    /**
     * @param $manufactures
     *
     * @return ManufactureRepresentation[]
     */
    protected function convertToRepresentation($manufactures)
    {
        return array_map(function (Manufacture $manufacture) {
            return new ManufactureRepresentation($manufacture);
        },
            $manufactures
        );
    }
}
