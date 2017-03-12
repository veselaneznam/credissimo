<?php

namespace Credissimo\Shop\UI\Value;

class ProductStatus
{
    const DELETED = 2;
    const ACTIVE = 1;

    const TO_STRING_MAPPING = [
        self::ACTIVE => 'Active',
        self::DELETED => 'Deleted',
    ];
}
