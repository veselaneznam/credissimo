<?php

namespace Credissimo\Shop\Application\Attribute;

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
}
