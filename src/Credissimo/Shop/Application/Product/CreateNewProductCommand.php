<?php

namespace Credissimo\Shop\Application\Product;

use Credissimo\Shop\Application\Manufacture\ManufactureRepresentation;
use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Model\Manufacture;
use Credissimo\Shop\Domain\Model\ProductImage;
use Credissimo\Shop\Domain\Value\Slug;
use Credissimo\Shop\Domain\Value\Description;
use Credissimo\User\Domain\Model\User;

class CreateNewProductCommand
{
    /** @var string */
    public $name;

    /** @var Slug */
    public $slug;

    /** @var Description */
    public $description;

    /** @var ProductImage[] */
    public $productImages;

    /** @var Category */
    public $category;

    /** @var \DateTime */
    public $createdAt;

    /** @var \DateTime */
    public $updatedAt;

    /** @var Manufacture */
    public $manufacture;

    /** @var string */
    public $model;

    /** @var \DateTime */
    public $yearOfManufacture;

    /** @var float */
    public $price;

    /** @var User */
    public $user;

    /** @var array */
    public $productFormData;

    /** @var array */
    public $attributes;

    public function __construct(
        array $productFormData,
        ManufactureRepresentation $manufacture,
        $attributes,
        User $user
    ) {
        if (null === $manufacture) {
            throw new \Exception('Manufacture is not valid');
        }

        $this->name = $productFormData['name'];
        $this->slug = $productFormData['slug'];
        $this->manufacture = $manufacture->convertToDomain();

        $this->productImages = [];
        $this->category = $this->manufacture->getCategory();

        $this->model = $productFormData['model'];
        $this->yearOfManufacture = $productFormData['yearOfManufacture'];
        $this->price = $productFormData['price'];
        $this->user = $user;
        $this->productFormData = $productFormData;
        $this->attributes = $attributes;
    }
}
