<?php

namespace App\Form;

use App\Entity\Network;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Validator\Constraints\NotBlank;
class NetworkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('platform',
              TextType::class,
                [
                    'label' => 'Plateforme',
                    'attr' => ['placeholder' => 'Plateforme'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer la Plateforme.',
                        ]),

                    ]
                ])
            ->add('url',
              TextType::class,
                [
                    'label' => 'Url',
                    'attr' => ['placeholder' => 'Url'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer l`\url',
                        ]),

                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Network::class,
        ]);
    }
}
