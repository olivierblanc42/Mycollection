<?php

namespace App\Form;

use App\Entity\Item;
use App\Entity\ItemLicense;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\NotBlank;

class ItemLicenseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('label',
            TextType::class,
                [
                    'label' => 'Nom de la licence',
                    'attr' => ['placeholder' => 'Nom de la licence'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer le Nom de la licence .',
                        ]),

                    ]
            ])
            ->add('description',
              TextType::class,
                [
                    'label' => 'Description',
                    'attr' => ['placeholder' => 'Description de la licence'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer la description de la licence.',
                        ]),

                    ]
                ])
            ->add('releaseDate',
                DateType::class,
                ['label' => "Date de création"])
            ->add('items', EntityType::class, [
                'class' => Item::class,
                'choice_label' => 'id',
                'multiple' => true,
                'label' => 'Goodies',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ItemLicense::class,
        ]);
    }
}
