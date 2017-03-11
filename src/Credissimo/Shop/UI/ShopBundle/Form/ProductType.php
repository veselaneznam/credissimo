<?php

namespace Credissimo\Shop\UI\ShopBundle\Form;

use Credissimo\Shop\Application\Product\ProductRepresentation;
use Credissimo\Shop\Domain\Model\Attribute;
use Credissimo\Shop\Domain\Model\Manufacture;
use Credissimo\Shop\UI\Value\AttributeTypes;
use Credissimo\Shop\UI\Value\AttributeValue;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /** @var Manufacture[] */
    private $manufactures;

    /** @var Attribute[]|null */
    private $attributes;

    /** @var ProductRepresentation */
    private $productRepresentation;

    public function __construct(
        $manufactures,
        ProductRepresentation $productRepresentation = null,
        $attributes = null
    ) {
        $this->manufactures = $manufactures;
        $this->attributes = $attributes;
        $this->productRepresentation = $productRepresentation;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->productRepresentation,
        ));
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array('required' => true, 'data'=> null))
            ->add('slug', TextType::class, array('required' => true, 'data'=> null))
            ->add('model', TextType::class, array('required' => true, 'data'=> null))
            ->add('yearOfManufacture', DateType::class, array('required' => true))
            ->add('price', NumberType::class, array('required' => true, 'data'=> null))
            ->add('manufacture', ChoiceType::class, ['choices' => $this->manufactures]);

        if (null !== $this->attributes && null !== $this->productRepresentation) {
            $data = $this->productRepresentation->getDescription();
            foreach ($this->attributes as $attribute) {

                /**
                 * @var AttributeValue $attributeValue
                 */
                $attributeValue = $data[$attribute->getName()];

                $builder->add(
                    $attribute->getName(),
                    AttributeTypes::MAPPING[$attribute->getType()],
                    [
                        'label' => $attribute->getLabel(),
                        'data' => !empty($attributeValue) ? $attributeValue->getValue() : null
                    ]);
            }
        }
    }
}
