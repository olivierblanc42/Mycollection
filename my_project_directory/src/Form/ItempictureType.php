<?php

namespace App\Form;

use App\Entity\Item;
use App\Entity\ItemPicture;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Validator\Constraints\NotBlank;


class ItempictureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('path',
              TextType::class,
                [
                    'label' => 'Url de l\'image',
                    'attr' => ['placeholder' => 'Url de l\'image'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer l\'url de l\'image.',
                        ]),

                    ]
                ])
            ->add('isMain',
            CheckboxType::class,
             [
                    'label' => 'Est image principale ?',
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer l\'url de l\'image.',
                        ]),

                    ]
            ])
            ->add('item', EntityType::class, [
                'class' => Item::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ItemPicture::class,
        ]);
    }
}
