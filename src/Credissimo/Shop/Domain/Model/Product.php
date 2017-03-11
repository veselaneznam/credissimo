<?php

namespace Credissimo\Shop\Domain\Model;

use Credissimo\Shop\Domain\Value\Description;
use Credissimo\Shop\Domain\Value\ProductStatuses;
use Credissimo\Shop\Domain\Value\Slug;
use Credissimo\User\Domain\Model\User;
use Doctrine\Common\Collections\ArrayCollection;

class Product
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

    /**
     * @var bool
     */
    private $status;

    /**
     * @param string         $name
     * @param string         $slug
     * @param Description    $description
     * @param ProductImage[] $productImages
     * @param Category       $category
     * @param Manufacture    $manufacture
     * @param string         $model
     * @param \DateTime      $yearOfManufacture
     * @param float          $price
     * @param User           $user
     */
    public function __construct(
        $name,
        $slug,
        Description $description,
        array $productImages,
        Category $category,
        Manufacture $manufacture,
        $model,
        \DateTime $yearOfManufacture,
        $price,
        User $user
    ) {
        $this->name = $name;
        $this->slug = Slug::transform($slug);
        $this->description = $description->serialize();
        $this->productImages = new ArrayCollection($productImages);
        $this->category = $category;
        $this->manufacture = $manufacture;
        $this->model = $model;
        $this->yearOfManufacture = $yearOfManufacture;
        $this->price = $price;
        $this->user = $user;
        $this->status = ProductStatuses::ACTIVE;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return mixed[]
     */
    public function getDescription()
    {
        return $this->description->getDescription();
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \DateTime
     */
    public function getYearOfManufacture()
    {
        return $this->yearOfManufacture;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return Product
     */
    public function setToDeleted()
    {
        $this->status = ProductStatuses::DELETED;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
}
