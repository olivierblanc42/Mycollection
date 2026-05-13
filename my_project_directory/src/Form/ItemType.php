<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Character;
use App\Entity\Illustrator;
use App\Entity\Item;
use App\Entity\ItemLicense;
use App\Entity\Type;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\NotBlank;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'title',
                TextType::class,
                [
                    'label' => 'Nom du goodie',
                    'attr' => ['placeholder' => 'Nom du goodie'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer Nom du goodie',
                        ]),

                    ]
                ]
            )
            ->add(
                'description',
                TextType::class,
                [
                    'label' => 'Descritpion',
                    'attr' => ['placeholder' => 'Descritpion'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer une descritpion.',
                        ]),

                    ]
                ]
            )
            ->add('releaseDate',  DateType::class,['label' => 'Date de sortie',])
            ->add('itemLicenses', EntityType::class, [
                'class' => ItemLicense::class,
                'choice_label' => 'id',
                'multiple' => true,
                'label' => 'Licenses',
                'attr' => ['placeholder' => 'Licenses'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer une Licenses.',
                    ]),
                ]

            ])
            ->add('illustrator', EntityType::class, [
                'class' => Illustrator::class,
                'choice_label' => 'id',
                'multiple' => true,
                'label' => 'illustrateurs',
                'attr' => ['placeholder' => 'illustrateurs'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un illustrateurs ou une illustratrices.',
                    ]),
                ]
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'label',
                'label' => 'Categorie',
                'attr' => ['placeholder' => 'Categorie'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer une Categorie.',
                    ]),
                ]
            ])
            ->add('characters', EntityType::class, [
                'class' => Character::class,
                'choice_label' => 'id',
                'multiple' => true,
                'label' => 'Personnages',
                'attr' => ['placeholder' => 'Personnages'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer au moins un Personnages.',
                    ]),
                ]

            ])
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'id',
                'label' => 'Type',
                'attr' => ['placeholder' => 'Type'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un Type.',
                    ]),
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);
    }
}
