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
     * @return Attribute[]
     */
    public function getAttributes()
    {
        return $this->attributeRepository->findAll();
    }

    /**
     * @param Category $category
     *
     * @return Attribute
     */
    public function getAttributesByCategory(Category $category)
    {
        return $this->attributeRepository->findAllByCategory($category);
    }
}
