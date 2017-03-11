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

    /**
     * @param string    $src
     * @param string    $title
     * @param Product   $product
     */
    public function __construct($src, $title, Product $product)
    {
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
}
