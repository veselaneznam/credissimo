<?php

namespace Credissimo\Shop\UI\ShopBundle\Form;

use Credissimo\Shop\Application\Attribute\AttributeRepresentation;
use Credissimo\Shop\Application\Product\ProductRepresentation;
use Credissimo\Shop\Domain\Model\Attribute;
use Credissimo\Shop\Domain\Model\Manufacture;
use Credissimo\Shop\UI\Value\AttributeTypes;
use Credissimo\Shop\UI\Value\AttributeValue;
use Credissimo\Shop\UI\Value\ProductStatus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

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
    )
    {
        $this->manufactures = $manufactures;
        $this->attributes = $attributes;
        $this->productRepresentation = $productRepresentation;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $manufactureDefaultValue = !empty($this->productRepresentation->getManufacture())
                                   ? $this->productRepresentation->getManufacture()->getId() : null;
        $builder
            ->add('name',
                TextType::class,
                array('required' => true, 'data' => $this->productRepresentation->getName())
            )
            ->add(
                'slug',
                TextType::class,
                array('required' => true, 'data' => $this->productRepresentation->getSlug())
            )
            ->add('model',
                TextType::class,
                array('required' => true, 'data' => $this->productRepresentation->getModel()))
            ->add('yearOfManufacture',
                DateType::class,
                array('required' => true,
                    'data' => $this->productRepresentation->getYearOfManufacture()))
            ->add('price',
                NumberType::class,
                array('required' => true, 'data' => $this->productRepresentation->getPrice()))
            ->add('manufacture',
                ChoiceType::class,
                ['choices' => $this->manufactures, 'data' => $manufactureDefaultValue])
            ->add('status',
                ChoiceType::class,
                [
                    'choices' => ProductStatus::TO_STRING_MAPPING,
                    'data' => $this->productRepresentation->getStatus()
                ]
            );

        if (null !== $this->attributes && null !== $this->productRepresentation) {
            $attributeValues = [];
            foreach ($this->attributes as $attribute) {
                $attributeValues[] = new AttributeValue(new AttributeRepresentation($attribute), null);
            }

            $dataAttributes = unserialize($this->productRepresentation->getDescription());
            $finalAttributeSet = array_merge($attributeValues, $dataAttributes);

            if (!empty($finalAttributeSet)) {
                foreach ($finalAttributeSet as $attributeValue) {
                    /**
                     * @var AttributeValue $attributeValue
                     */
                    $builder->add(
                        $attributeValue->getAttribute()->getName(),
                        AttributeTypes::MAPPING[$attributeValue->getAttribute()->getType()],
                        [
                            'label' => $attributeValue->getAttribute()->getLabel(),
                            'data' => $attributeValue->getValue()
                        ]);
                }
            }
        }
    }
}
