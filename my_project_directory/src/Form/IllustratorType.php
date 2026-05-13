<?php

namespace App\Form;

use App\Entity\Illustrator;
use App\Entity\Item;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\NotBlank;

class IllustratorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'nickname',
                TextType::class,
                [
                    'label' => 'Surnom',
                    'attr' => ['placeholder' => 'Surnom'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer le surnom de illutrateur ou de  illustratrice .',
                        ]),

                    ]
                ]
            )
            ->add(
                'firstName',
                TextType::class,
                [
                    'label' => 'Prénom',
                    'attr' => ['placeholder' => 'Prénom'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer le prénom de illutrateur ou de  illustratrice .',
                        ]),

                    ]
                ]
            )
            ->add('lastName',
             TextType::class,
                [
                    'label' => 'Nom',
                    'attr' => ['placeholder' => 'Nom'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer le nom de illutrateur ou de  illustratrice .',
                        ]),

                    ]
                ])
            ->add('illustratorPicture',
            TextType::class,
                [
                    'label' => 'lien photo de profil',
                    'attr' => ['placeholder' => 'lien photo de profil'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer le lien photo de la profil .',
                        ]),

                    ]
            ])
            ->add('birthDate',
            DateType::class,
            ['label'=>"Date de naissance"]
)
            // ->add('items', EntityType::class, [
            //     'class' => Item::class,
            //     'choice_label' => 'id',
            //     'multiple' => true,
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Illustrator::class,
        ]);
    }
}
