<?php

namespace Credissimo\Shop\Application\Product;

use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Model\Manufacture;
use Credissimo\Shop\Domain\Model\Product;
use Credissimo\Shop\Domain\Model\ProductImage;
use Credissimo\Shop\Domain\Value\Description;
use Credissimo\Shop\Domain\Value\Slug;
use Credissimo\User\Domain\Model\User;

class ProductRepresentation
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var Slug */
    private $slug;

    /** @var Description */
    private $description;

    /** @var ProductImage[] */
    private $productImages;

    /** @var Category */
    private $category;

    /** @var \DateTime */
    private $createdAt;

    /** @var \DateTime */
    private $updatedAt;

    /** @var Manufacture */
    private $manufacture;

    /** @var string */
    private $model;

    /** @var \DateTime */
    private $yearOfManufacture;

    /** @var float */
    private $price;

    /** @var User */
    private $user;

    public function __construct(Product $product)
    {
        $this->id = $product->getId();
        $this->name = $product->getName();
        $this->slug = $product->getSlug();
        $this->description = $product->getDescription();
        $this->productImages = $product->getProductImages();
        $this->category = $product->getCategory();
        $this->manufacture = $product->getManufacture();
        $this->model = $product->getModel();
        $this->yearOfManufacture = $product->getYearOfManufacture();
        $this->price = $product->getPrice();
        $this->user = $product->getUser();
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
     * @return Slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return Description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return ProductImage[]
     */
    public function getProductImages()
    {
        return $this->productImages;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
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

    /**
     * @return Manufacture
     */
    public function getManufacture()
    {
        return $this->manufacture;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return \DateTime
     */
    public function getYearOfManufacture()
    {
        return $this->yearOfManufacture;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
