<?php

namespace Credissimo\Shop\Domain\Model;

use Credissimo\Shop\Domain\Value\AttributeTypes;

class Attribute
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $label;

    /** @var AttributeTypes */
    private $type;

    /** @var Category */
    private $category;

    /** @var \DateTime */
    private $createdAt;

    /** @var \DateTime */
    private $updatedAt;

    /**
     * @param string         $name
     * @param string         $label
     * @param AttributeTypes $type
     * @param Category       $category
     */
    public function __construct($name, $label, AttributeTypes $type, Category $category)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->category = $category;
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
     * @return integer
     */
    public function getType()
    {
        return $this->type->getId();
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
