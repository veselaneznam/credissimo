<?php

namespace Credissimo\Shop\Application\Attribute;

use Credissimo\Shop\Domain\Model\Attribute;
use Credissimo\Shop\Domain\Repository\AttributeRepository;

class AttributeService
{
    /** @var AttributeRepository */
    private $attributeRepository;

    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function create(CreateNewAttributeCommand $command)
    {
        $attribute = new Attribute($command->name, $command->label, $command->type, $command->category);
        $this->attributeRepository->save($attribute);
    }
}
