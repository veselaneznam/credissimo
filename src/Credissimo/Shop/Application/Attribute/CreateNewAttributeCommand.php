<?php

namespace Credissimo\Shop\Application\Attribute;

use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Value\AttributeType;

class CreateNewAttributeCommand
{

    /** @var string */
    public $name;

    /** @var string */
    public $label;

    /** @var AttributeType */
    public $type;

    /** @var Category */
    public $category;

    /**
     * @param string   $name
     * @param string   $label
     * @param int      $type
     * @param Category $category
     */
    public function __construct($name, $label, $type, Category $category)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = new AttributeType($type);
        $this->category = $category;
    }
}
