<?php

namespace Credissimo\Shop\Domain\Model;

class Category
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var Product[] */
    private $products;

    /** @var Attribute[] */
    private $attributes;

    /** @var \DateTime */
    private $createdAt;

    /** @var \DateTime */
    private $updatedAt;

    /**
     * @param int         $id
     * @param string      $name
     * @param Product[]   $products
     * @param Attribute[] $attributes
     */
    public function __construct($id, $name, array $products, array $attributes)
    {
        $this->id = $id;
        $this->name = $name;
        $this->products = $products;
        $this->attributes = $attributes;
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
}
