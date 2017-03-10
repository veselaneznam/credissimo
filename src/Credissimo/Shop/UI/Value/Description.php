<?php

namespace Credissimo\Shop\UI\Value;

use Credissimo\Shop\Application\Attribute\AttributeRepresentation;

class Description implements \Serializable
{
    /**
     * @var AttributeRepresentation[]
     */
    private $attributes;

    /** @var mixed[]*/
    private $data;

    /** @var mixed[]*/
    private $description = [];

    /**
     * @param AttributeRepresentation[] $attributes
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
                $this->description[$attribute->getName()] = new AttributeValue($attribute, $this->data[$attribute->getName()]);
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
        return $this->description;
    }
}
