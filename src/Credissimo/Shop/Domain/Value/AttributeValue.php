<?php

namespace Credissimo\Shop\Domain\Value;

use Credissimo\Shop\Domain\Model\Attribute;

class AttributeValue
{
    /** @var Attribute */
    private $attribute;

    /** @var mixed */
    private $value;

    /**
     * @param Attribute $attribute
     * @param           $value
     */
    public function __construct(Attribute $attribute, $value)
    {
        $this->attribute = $attribute;
        $this->value = $value;
    }

    /**
     * @return Attribute
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
