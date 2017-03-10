<?php

namespace Credissimo\Shop\Application\Attribute;

use Credissimo\Shop\Domain\Model\Attribute;
use Credissimo\Shop\Domain\Model\Category;

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
}
