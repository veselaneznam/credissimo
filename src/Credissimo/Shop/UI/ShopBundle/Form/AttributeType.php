<?php

namespace Credissimo\Shop\UI\ShopBundle\Form;

use Credissimo\Shop\UI\Value\AttributeTypes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class AttributeType extends AbstractType
{
    /** @var array*/
    private $categoriesList;

    /**
     * @param $categoriesList
     */
    public function __construct($categoriesList)
    {
        $this->categoriesList = $categoriesList;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array('required' => true))
            ->add('label', TextType::class, array('required' => true))
            ->add('type', ChoiceType::class, array( 'choices' => AttributeTypes::TO_STRING))
            ->add('category', ChoiceType::class, array('choices' => $this->categoriesList))
        ;
    }
}
