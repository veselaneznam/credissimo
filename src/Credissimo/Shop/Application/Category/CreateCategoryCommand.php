<?php

namespace Credissimo\Shop\Application\Category;

class CreateCategoryCommand
{
    public $name;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}
