<?php

namespace Credissimo\Shop\Application\Category;

use Credissimo\Shop\Domain\Model\Category;

class CategoryRepresentation
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /**
     * @var Category
     */
    private $category;

    /**
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->id = $category->getId();
        $this->name = $category->getName();
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
     * @return Category
     */
    public function convertToDomain()
    {
       return $this->category;
    }
}
