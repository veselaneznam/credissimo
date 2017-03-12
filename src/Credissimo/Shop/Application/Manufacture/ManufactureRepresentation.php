<?php

namespace Credissimo\Shop\Application\Manufacture;

use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Model\Manufacture;

class ManufactureRepresentation
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var Category */
    private $category;

    /**
     * @var Manufacture
     */
    private $manufacture;

    /**
     * @param Manufacture $manufacture
     */
    public function __construct(Manufacture $manufacture)
    {
        $this->id = $manufacture->getId();
        $this->name = $manufacture->getName();
        $this->category = $manufacture->getCategory();
        $this->manufacture = $manufacture;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return Manufacture
     */
    public function convertToDomain()
    {
        return $this->manufacture;
    }
}
