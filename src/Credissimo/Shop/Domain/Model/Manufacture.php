<?php

namespace Credissimo\Shop\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Manufacture
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var Product[] */
    private $products;

    /** @var Category */
    private $category;

    /**
     * @param string    $name
     * @param Product[] $products
     * @param Category  $category
     */
    public function __construct ($name, array $products, Category $category)
    {
        $this->name = $name;
        $this->products = new ArrayCollection($products);
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
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
