<?php

namespace Credissimo\Shop\Application\Product;

use Credissimo\Shop\Application\Manufacture\ManufactureRepresentation;
use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Model\Manufacture;
use Credissimo\Shop\Domain\Model\Product;
use Credissimo\Shop\Domain\Model\ProductImage;
use Credissimo\Shop\Domain\Value\Description;
use Credissimo\Shop\Domain\Value\Slug;
use Credissimo\Shop\UI\Value\ProductStatus;
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

    /** @var ManufactureRepresentation */
    private $manufacture;

    /** @var string */
    private $model;

    /** @var \DateTime */
    private $yearOfManufacture;

    /** @var float */
    private $price;

    /** @var User */
    private $user;

    /**
     * @var int
     */
    private $status;

    public function __construct(Product $product = null)
    {
        if (null !== $product) {
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
            $this->status = $product->getStatus();
        }
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
        return isset($this->name) ? $this->name : null;
    }

    /**
     * @return Slug
     */
    public function getSlug()
    {
        return isset($this->slug) ? $this->slug : null;
    }

    /**
     * @return Description
     */
    public function getDescription()
    {
        return isset($this->description) ? $this->description : null;
    }

    /**
     * @return ProductImage[]
     */
    public function getProductImages()
    {
        return isset($this->productImages) ? $this->productImages : null;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return isset($this->category) ? $this->category : null;
    }

    /**
     * @return ManufactureRepresentation
     */
    public function getManufacture()
    {
        return isset($this->manufacture) ? $this->manufacture : null;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return isset($this->model) ? $this->model : null;
    }

    /**
     * @return \DateTime
     */
    public function getYearOfManufacture()
    {
        return isset($this->yearOfManufacture) ? $this->yearOfManufacture : null;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return isset($this->price) ? $this->price : null;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return isset($this->status) ? $this->status : ProductStatus::ACTIVE;
    }

    /**
     * @param int $id
     *
     * @return ProductRepresentation
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return ProductRepresentation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param Slug $slug
     *
     * @return ProductRepresentation
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @param Description $description
     *
     * @return ProductRepresentation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param ProductImage[] $productImages
     *
     * @return ProductRepresentation
     */
    public function setProductImages($productImages)
    {
        $this->productImages = $productImages;

        return $this;
    }

    /**
     * @param Category $category
     *
     * @return ProductRepresentation
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @param Manufacture $manufacture
     *
     * @return ProductRepresentation
     */
    public function setManufacture($manufacture)
    {
        $this->manufacture = $manufacture;

        return $this;
    }

    /**
     * @param string $model
     *
     * @return ProductRepresentation
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @param \DateTime $yearOfManufacture
     *
     * @return ProductRepresentation
     */
    public function setYearOfManufacture(\DateTime $yearOfManufacture)
    {
        $this->yearOfManufacture = $yearOfManufacture;

        return $this;
    }

    /**
     * @param float $price
     *
     * @return ProductRepresentation
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @param int $status
     *
     * @return ProductRepresentation
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
