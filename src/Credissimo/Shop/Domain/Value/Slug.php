<?php

namespace Credissimo\Shop\Domain\Value;

class Slug
{
    const CHARACTER = '-';

    public function __construct($string)
    {
        $string = trim(strtolower($string));

        $string = str_replace("'", "", $string);

        $string = preg_replace('/[^a-z0-9]/', self::CHARACTER, $string);

        $string = trim($string, self::CHARACTER);

        return $string;
    }
}
