<?php

namespace Credissimo\Shop\Application\Category;

use Credissimo\Shop\Domain\Model\Attribute;
use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Model\Manufacture;
use Credissimo\Shop\Domain\Model\Product;

class CategoryRepresentation
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var Product[] */
    private $products;

    /** @var Attribute[] */
    private $attributes;

    /** @var Manufacture[] */
    private $manufactures;

    /**
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->id = $category->getId();
        $this->name = $category->getName();
        $this->products = $category->getProducts();
        $this->attributes = $category->getAttributes();
        $this->manufactures = $category->getManufactures();
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
     * @return Attribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return Manufacture[]
     */
    public function getManufactures()
    {
        return $this->manufactures;
    }
}
