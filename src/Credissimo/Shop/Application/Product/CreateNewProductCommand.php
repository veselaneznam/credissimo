<?php

namespace Credissimo\Shop\Application\Product;

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

    public function __construct(
        $name,
        $slug,
        Description $description,
        array $productImages = null,
        Manufacture $manufacture,
        $model,
        \DateTime $yearOfManufacture,
        $price,
        User $user
    ) {
        if (null === $manufacture) {
            throw new \Exception('Manufacture is not valid');
        }

        $this->name = $name;
        $this->slug = $slug;
        $this->manufacture = $manufacture;

        $this->description = $description;
        $this->productImages = [];
        $this->category = $this->manufacture->getCategory();

        $this->model = $model;
        $this->yearOfManufacture = $yearOfManufacture;
        $this->price = $price;
        $this->user = $user;
    }
}
