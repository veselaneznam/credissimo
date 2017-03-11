<?php

namespace Credissimo\Shop\Application\Product;

use Credissimo\Shop\Domain\Model\Attribute;
use Credissimo\Shop\Domain\Model\Product;
use Credissimo\Shop\Domain\Repository\ProductRepository;
use Credissimo\Shop\Domain\Value\Description;

class ProductService
{
    /** @var ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create(CreateNewProductCommand $command)
    {
        $product = new Product(
            $command->name,
            $command->slug,
            $command->description,
            $command->productImages,
            $command->category,
            $command->manufacture,
            $command->model,
            $command->yearOfManufacture,
            $command->price,
            $command->user
        );

        $this->productRepository->save($product);
    }

    /**
     * @param Attribute[] $attributes
     * @param mixed       $data
     *
     * @return Description
     */
    public function transformToDescription(array $attributes, $data)
    {
        return new Description($attributes, $data);
    }

    /**
     * @param DeleteProductCommand $command
     */
    public function delete(DeleteProductCommand $command)
    {
        $this->productRepository->delete($command->product);
    }
}
