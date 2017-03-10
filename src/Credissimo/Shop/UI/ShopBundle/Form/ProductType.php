<?php

namespace Credissimo\Shop\UI\ShopBundle\Form;

use Credissimo\Shop\Application\Product\ProductRepresentation;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ProductRepresentation::class,
        ));
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('product')
            ->add('name', TextType::class, array('mapped' => false, 'required' => true))
            ->add('slug', TextType::class, array('mapped' => false, 'required' => true))
            ->add('model', TextType::class, array('mapped' => false, 'required' => true))
            ->add('year_of_manufacture', DateType::class, array('mapped' => false, 'required' => true))
            ->add('price', CurrencyType::class, array('mapped' => false, 'required' => true))
        ;
    }
}
