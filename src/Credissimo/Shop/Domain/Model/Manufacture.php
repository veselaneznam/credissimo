<?php

namespace Credissimo\Shop\Domain\Model;

class Manufacture
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var Product[] */
    private $products;

    /** @var \DateTime */
    private $createdAt;

    /** @var \DateTime */
    private $updatedAt;

    /**
     * @param int       $id
     * @param string    $name
     * @param Product[] $products
     */
    public function __construct($id, $name, array $products)
    {
        $this->id = $id;
        $this->name = $name;
        $this->products = $products;
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
