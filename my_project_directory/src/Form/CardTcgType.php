<?php

namespace App\Form;

use App\Entity\CardTcg;
use App\Entity\Category;
use App\Entity\Character;
use App\Entity\Expansion;
use App\Entity\Illustrator;
use App\Entity\ItemLicense;
use App\Entity\Type;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;

class CardTcgType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'title',
                TextType::class,
                [
                    'label' => 'Nom de la carte',
                    'attr' => ['placeholder' => 'nom de la carte'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer le nom de la carte.',
                        ]),

                    ]
                ]

            )
            ->add(
                'description',
                TextType::class,
                [
                    'label' => 'Description',
                    'attr' => ['placeholder' => 'Description de la carte'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer la description de la carte.',
                        ]),

                    ]
                ]
            )
            // ->add('releaseDate')
            // ->add('creationDate')
            ->add(
                'rarity',
                TextType::class,
                [
                    'label' => 'Rareté ',
                    'attr' => ['placeholder' => 'Rareté de la carte'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer la Rareté de la carte.',
                        ]),

                    ]
                ]
            )
            ->add(
                'cardCode',
                TextType::class,
                [
                    'label' => 'Code',
                    'attr' => ['placeholder' => 'Code de la carte'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer le code de la carte.',
                        ]),

                    ]
                ]
            )
            ->add('itemLicenses', EntityType::class, [
                'label' => 'License',
                'class' => ItemLicense::class,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez choisir au moins une license.',
                    ]),

                ],
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('illustrator', EntityType::class, [
                'label' => 'Illustrateur',
                'class' => Illustrator::class,
                'choice_label' => 'id',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez choisir au moins un illutrateur.',
                    ]),

                ],
                'multiple' => true,
            ])
            ->add('category', EntityType::class, [
                'label' => 'Catégorie',
                'class' => Category::class,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez choisir au moins une catégorie.',
                    ]),

                ],
                'choice_label' => 'id',
            ])
            ->add('characters', EntityType::class, [
                'label' => 'Personnage',
                'class' => Character::class,
                'choice_label' => 'id',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez choisir au moins un personnage.',
                    ]),

                ],
                'multiple' => true,
            ])
            ->add('type', EntityType::class, [
                'label' => 'Type',
                'class' => Type::class,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez choisir au moins un type.',
                    ]),

                ],
                'choice_label' => 'id',
            ])
            ->add('expension', EntityType::class, [
                'label' => 'Extension',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez choisir au moins une extension.',
                    ]),

                ],
                'class' => Expansion::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CardTcg::class,
        ]);
    }
}
