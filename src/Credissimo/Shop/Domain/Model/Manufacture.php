<?php

namespace Credissimo\Shop\Domain\Model;

class Manufacture
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var Category */
    private $category;

    /**
     * @param string    $name
     * @param Category  $category
     */
    public function __construct ($name, Category $category)
    {
        $this->name = $name;
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
    public function getCategory()
    {
        return $this->category;
    }
}
