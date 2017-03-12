<?php

namespace Credissimo\Shop\Application\Manufacture;

use Credissimo\Shop\Application\Category\CategoryRepresentation;

class CreateNewManufactureCommand
{
    /** @var string */
    public $name;

    /**
     * @var CategoryRepresentation
     */
    public $category;

    /**
     * @param          $name
     * @param CategoryRepresentation $category
     */
    public function __construct(
        $name,
        CategoryRepresentation $category
    ) {
        $this->name = $name;
        $this->category = $category;
    }
}
