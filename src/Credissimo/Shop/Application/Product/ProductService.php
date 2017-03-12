<?php

namespace Credissimo\Shop\Application\Product;

use Credissimo\Shop\Application\Attribute\AttributeRepresentation;
use Credissimo\Shop\Domain\Model\Product;
use Credissimo\Shop\Domain\Repository\ProductRepository;
use Credissimo\Shop\Domain\Value\Description;
use Credissimo\Shop\UI\Value\ProductStatus;

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
        $description = $this->transformToDescription($command->attributes, $command->productFormData);
        $product = new Product(
            $command->name,
            $command->slug,
            $description,
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
     * @param UpdateProductCommand $command
     */
    public function update(UpdateProductCommand $command)
    {
        $product = new Product(
            $command->productRepresentation->getName(),
            $command->productRepresentation->getSlug(),
            $command->productRepresentation->getDescription(),
            $command->productRepresentation->getProductImages(),
            $command->productRepresentation->getCategory(),
            $command->productRepresentation->getManufacture()->convertToDomain(),
            $command->productRepresentation->getModel(),
            $command->productRepresentation->getYearOfManufacture(),
            $command->productRepresentation->getPrice(),
            $command->productRepresentation->getUser()
        );
        $product->setId($command->productRepresentation->getId());

        if(ProductStatus::DELETED === $command->productRepresentation->getStatus()) {
            $product->setToDeleted();
        }
        $this->productRepository->update($product);
    }

    /**
     * @param AttributeRepresentation[] $attributes
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

    /**
     * @param ActivateProductCommand $command
     */
    public function activate(ActivateProductCommand $command)
    {
        $this->productRepository->update($command->product);
    }
}
