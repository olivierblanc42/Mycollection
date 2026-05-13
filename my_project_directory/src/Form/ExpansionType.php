<?php

namespace App\Form;

use App\Entity\Expansion;
use App\Entity\Tcg;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\NotBlank;

class ExpansionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label',
              TextType::class,
                [
                    'label' => 'Nom de l\'extension',
                    'attr' => ['placeholder' => 'Nom de l\'extension'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer Nom de l\'extension.',
                        ]),

                    ]
                ]
            )
            ->add('creationDate',
             DateType::class,
                [
                    'label' => 'Date de sortie',
                    'attr' => ['placeholder' => 'Date de sortie'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez choisir une date de sortie',
                        ]),

                    ]
                ])
            ->add('descritpion',
                          TextType::class,
                [
                    'label' => 'Descritpion',
                    'attr' => ['placeholder' => 'Descritpion'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer une descritpion.',
                        ]),

                    ]
                ])
            ->add('tcg', EntityType::class, [
                'class' => Tcg::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Expansion::class,
        ]);
    }
}
