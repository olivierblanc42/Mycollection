<?php

namespace App\Form;

use App\Entity\Tcg;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;

class TcgType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label',
            TextType::class,
            [
                'label' => 'Nom du Tcg',
                'attr' => ['placeHolder'=> 'Nom du Tcg'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer le nom du Tcg.',
                    ]),
                ]
            ]
            )
            ->add('description',
            TextareaType::class,
            [
                'label' => 'Description du Tcg',
                'attr' => ['placeHolder' => 'Description du Tcg'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer la description du Tcg.',
                    ]),
                ]
            ]
        )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tcg::class,
        ]);
    }
}
