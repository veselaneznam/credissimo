<?php

namespace Credissimo\Shop\Application\Attribute;

use Credissimo\Shop\Domain\Model\Attribute;
use Credissimo\Shop\Domain\Model\Category;
use Credissimo\Shop\Domain\Repository\AttributeRepository;

class AttributeQueryService
{
    /** @var AttributeRepository */
    private $attributeRepository;

    /**
     * @param AttributeRepository $attributeRepository
     */
    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * @return AttributeRepresentation[]
     */
    public function getAttributes()
    {
        $attributes = $this->attributeRepository->findAll();

        return $this->convertToRepresentation($attributes);
    }

    /**
     * @param Category $category
     *
     * @return AttributeRepresentation[]
     */
    public function getAttributesByCategory(Category $category)
    {
        $attributes = $this->attributeRepository->findAllByCategory($category);

        return $this->convertToRepresentation($attributes);
    }

    /**
     * @param $attributes
     *
     * @return AttributeRepresentation[]
     */
    protected function convertToRepresentation($attributes)
    {
        return array_map(function (Attribute $attribute) {
            return new AttributeRepresentation($attribute);
        },
            $attributes
        );
    }
}
