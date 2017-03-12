<?php

namespace Credissimo\Shop\Domain\Value;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class AttributeTypeCollection
{
    const CHOICE_TYPE = 1;
    const DATETIME_TYPE = 2;
    const TEXT_TYPE = 3;
    const RADIO_TYPE = 4;
    const TEXTAREA_TYPE = 5;
    const URL_TYPE = 6;
    const PERCENT_TYPE = 7;
    const NUMBER_TYPE = 8;

    const MAPPING = [
        self::CHOICE_TYPE => ChoiceType::class,
        self::DATETIME_TYPE => DateTimeType::class,
        self::TEXT_TYPE => TextType::class,
        self::RADIO_TYPE => RadioType::class,
        self::TEXTAREA_TYPE => TextareaType::class,
        self::URL_TYPE => UrlType::class,
        self::PERCENT_TYPE => PercentType::class,
        self::NUMBER_TYPE => NumberType::class,
    ];

    const ALL = [
    self::CHOICE_TYPE ,
    self::DATETIME_TYPE,
    self::TEXT_TYPE,
    self::RADIO_TYPE,
    self::TEXTAREA_TYPE,
    self::URL_TYPE,
    self::PERCENT_TYPE,
    self::NUMBER_TYPE,
    ];
}
