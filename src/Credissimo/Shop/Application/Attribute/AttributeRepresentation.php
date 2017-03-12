<?php

namespace Credissimo\Shop\Application\Attribute;

use Credissimo\Shop\Domain\Model\Attribute;
use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\UI\Value\AttributeTypes;

class AttributeRepresentation
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $label;

    /** @var int */
    private $type;

    /** @var Category */
    private $category;

    /** @var Attribute */
    private $attribute;

    /**
     * @param Attribute $attribute
     */
    public function __construct(Attribute $attribute)
    {
        $this->id = $attribute->getId();
        $this->name = $attribute->getName();
        $this->label = $attribute->getLabel();
        $this->type = $attribute->getType();
        $this->category = $attribute->getCategory();
        $this->attribute = $attribute;
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
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getTypeAsString()
    {
        return AttributeTypes::TO_STRING[$this->type];
    }

    /**
     * @return Attribute
     */
    public function convertToDomain()
    {
        return $this->attribute;
    }
}
