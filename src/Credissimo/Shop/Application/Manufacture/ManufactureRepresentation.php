<?php

namespace Credissimo\Shop\Application\Manufacture;

use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Model\Manufacture;
use Credissimo\Shop\Domain\Model\Product;

class ManufactureRepresentation
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var Product[] */
    private $products;

    /** @var Category */
    private $category;

    public function __construct(Manufacture $manufacture)
    {
        $this->id = $manufacture->getId();
        $this->name = $manufacture->getName();
        $this->products = $manufacture->getProducts();
        $this->category = $manufacture->getCategory();
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
