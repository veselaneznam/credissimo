<?php

namespace Credissimo\Shop\UI\Value;

use Credissimo\Shop\Application\Attribute\AttributeRepresentation;

class AttributeValue
{
    /** @var AttributeRepresentation */
    private $attribute;

    /** @var mixed */
    private $value;

    /**
     * @param AttributeRepresentation $attribute
     * @param mixed                   $value
     */
    public function __construct(AttributeRepresentation $attribute, $value)
    {
        $this->attribute = $attribute;
        $this->value = $value;
    }

    /**
     * @return AttributeRepresentation
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
