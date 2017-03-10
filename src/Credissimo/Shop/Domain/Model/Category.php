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

    /** @var Manufacture[] */
    private $manufactures;

    /** @var \DateTime */
    private $createdAt;

    /** @var \DateTime */
    private $updatedAt;

    /**
     * @param string       $name
     * @param Product[]    $products
     * @param Attribute[]  $attributes
     * @param Manufacture[] $manufactures
     */
    public function __construct(
        $name,
        array $products,
        array $attributes,
        array $manufactures
    ) {
        $this->name = $name;
        $this->products = $products;
        $this->attributes = $attributes;
        $this->manufactures = $manufactures;
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
     * @return Manufacture[]
     */
    public function getManufactures()
    {
        return $this->manufactures;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
