<?php

namespace Credissimo\Shop\UI\ShopBundle\Form;

use Credissimo\Shop\Application\Attribute\AttributeRepresentation;
use Credissimo\Shop\UI\Value\AttributeTypes;
use Credissimo\Shop\UI\Value\AttributeValue;
use Credissimo\Shop\UI\Value\Description;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilder;

class ProductFormHelper
{
    /**
     * @param FormBuilder                            $form
     * @param array                           $manufactures
     * @param Description                     $description
     * @param AttributeRepresentation[]| null $attributes
     *
     * @return FormBuilder
     */
    public static function createForm(
        FormBuilder $form,
        array $manufactures,
        Description $description = null,
        $attributes = null
    ) {
        $form->add('product', ProductType::class)
            ->add('productImage', FileType::class)
            ->add('manufacture', ChoiceType::class, ['choices' => $manufactures]);

        if (null !== $attributes) {
            $data = $description->getDescription();
            foreach ($attributes as $attribute) {

                /**
                 * @var AttributeValue $attributeValue
                 */
                $attributeValue = $data[$attribute->getName()];

                $form->add(
                    $attribute->getName(),
                    AttributeTypes::MAPPING[$attribute->getType()],
                    [
                        'label' => $attribute->getLabel(),
                        'data' => !empty($attributeValue) ? $attributeValue->getValue() : null
                    ]);
            }
        }

        $form->add('save', SubmitType::class);

        return $form->getForm();
    }
}
