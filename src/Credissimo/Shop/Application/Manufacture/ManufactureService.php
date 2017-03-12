<?php

namespace Credissimo\Shop\Application\Manufacture;

use Credissimo\Shop\Domain\Model\Manufacture;
use Credissimo\Shop\Domain\Repository\ManufactureRepository;

class ManufactureService
{
    /** @var ManufactureRepository */
    private $manufactureRepository;

    /**
     * @param ManufactureRepository $manufactureRepository
     */
    public function __construct(ManufactureRepository $manufactureRepository)
    {

        $this->manufactureRepository = $manufactureRepository;
    }

    public function create(CreateNewManufactureCommand $command)
    {
        $manufacture = new Manufacture($command->name, $command->category->convertToDomain());
        $this->manufactureRepository->save($manufacture);
    }
}
