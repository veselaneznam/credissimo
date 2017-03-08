<?php

namespace Credissimo\Shop\Domain\Model;

use Credissimo\Shop\Domain\Value\Description;
use Credissimo\Shop\Domain\Value\Slug;

class Product
{
    /** @var int*/
    private $id;

    /** @var string */
    private $name;

    /** @var Slug */
    private $slug;

    /** @var Description */
    private $description;

    /** @var ProductImage[]*/
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

    /**
     * @param int            $id
     * @param                $name
     * @param Slug           $slug
     * @param Description    $description
     * @param ProductImage[] $productImages
     * @param Category       $category
     * @param Manufacture    $manufacture
     * @param string         $model
     * @param \DateTime      $yearOfManufacture
     */
    public function __construct(
        $id,
        $name,
        Slug $slug,
        Description $description,
        array $productImages,
        Category $category,
        Manufacture $manufacture,
        $model,
        \DateTime $yearOfManufacture
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->description = $description;
        $this->productImages = $productImages;
        $this->category = $category;
        $this->manufacture = $manufacture;
        $this->model = $model;
        $this->yearOfManufacture = $yearOfManufacture;
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
     * @return Manufacture
     */
    public function getManufacture()
    {
        return $this->manufacture;
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
}
