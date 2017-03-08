<?php

namespace Credissimo\Shop\Domain\Model;

class ProductImage
{
    /** @var int */
    private $id;

    /** @var string */
    private $src;

    /** @var string */
    private $title;

    /** @var Product */
    private $product;

    /** @var \DateTime */
    private $createdAt;

    /** @var \DateTime */
    private $updatedAt;

    /**
     * @param int       $id
     * @param string    $src
     * @param string    $title
     * @param Product   $product
     */
    public function __construct($id, $src, $title, Product $product)
    {
        $this->id = $id;
        $this->src = $src;
        $this->title = $title;
        $this->product = $product;
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
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
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
