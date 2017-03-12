<?php

namespace Credissimo\Shop\Domain\Value;

use Credissimo\Shop\Domain\Model\Attribute;

class Description implements \Serializable
{
    /**
     * @var Attribute[]
     */
    private $attributes;

    /** @var mixed[]*/
    private $data;

    /** @var mixed[]*/
    private $description = [];

    /**
     * @param Attribute[] $attributes
     * @param mixed[]    $data
     */
    public function __construct(array $attributes, array $data)
    {
        $this->attributes = $attributes;
        $this->data = $data;
        $this->mapAttributesToValues();
    }

    private function mapAttributesToValues()
    {
        foreach ($this->attributes as $attribute) {
            if(!empty($this->data[$attribute->getName()])) {
                $this->description[] = new AttributeValue($attribute->convertToDomain(), $this->data[$attribute->getName()]);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize($this->description);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        $this->description = unserialize($serialized);
    }

    /**
     * @return \mixed[]
     */
    public function getDescription()
    {
        return unserialize($this->description);
    }
}
