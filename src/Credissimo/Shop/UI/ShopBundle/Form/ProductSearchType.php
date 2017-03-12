<?php

namespace Credissimo\Shop\UI\ShopBundle\Form;

use Credissimo\Shop\UI\Value\ProductStatus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductSearchType extends AbstractType
{
    /**
     * @var array
     */
    private $manufactures;

    /**
     * @var array
     */
    private $categories;

    /**
     * @param $manufactures
     * @param $categories
     */
    public function __construct($manufactures, $categories)
    {
        $this->manufactures = $manufactures;
        $this->categories = $categories;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array('required' => false))
            ->add('manufacture', ChoiceType::class, array( 'choices' => $this->manufactures, 'required' => false))
            ->add('category', ChoiceType::class, array('choices' => $this->categories, 'required' => false))
            ->add('status', ChoiceType::class, array('choices' => ProductStatus::TO_STRING_MAPPING, 'data' => ProductStatus::ACTIVE))
            ->add('submit', SubmitType::class, array('label' => 'Search'))
        ;
    }
}
