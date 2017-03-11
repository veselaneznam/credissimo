<?php

namespace Credissimo\Shop\Application\Manufacture;

use Credissimo\Shop\Domain\Model\Category;

class CreateNewManufactureCommand
{
    /** @var string */
    public $name;

    /**
     * @var Category
     */
    public $category;

    /**
     * @param          $name
     * @param Category $category
     */
    public function __construct(
        $name,
        Category $category
    ) {
        $this->name = $name;
        $this->category = $category;
    }
}
