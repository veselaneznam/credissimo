<?php

namespace Credissimo\Shop\Application\Attribute;

use Credissimo\Shop\Application\Category\CategoryRepresentation;
use Credissimo\Shop\Domain\Value\AttributeType;

class CreateNewAttributeCommand
{

    /** @var string */
    public $name;

    /** @var string */
    public $label;

    /** @var AttributeType */
    public $type;

    /** @var CategoryRepresentation */
    public $category;

    /**
     * @param string   $name
     * @param string   $label
     * @param int      $type
     * @param CategoryRepresentation $category
     */
    public function __construct($name, $label, $type, CategoryRepresentation $category)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = new AttributeType($type);
        $this->category = $category->convertToDomain();
    }
}
