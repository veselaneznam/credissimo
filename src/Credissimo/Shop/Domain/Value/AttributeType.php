<?php

namespace Credissimo\Shop\Domain\Value;

class AttributeType
{
    /**
     * @var int
     */
    private $type;

    /**
     * @param int $type
     *
     * @throws \Exception
     */
    public function __construct($type)
    {
        if(!in_array($type, AttributeTypeCollection::ALL)) {
            throw new \Exception('Type is not Valid');
        }
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }
}
