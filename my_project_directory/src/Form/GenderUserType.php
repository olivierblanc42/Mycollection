<?php

namespace App\Form;

use App\Entity\GenderUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;

class GenderUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'label',
                TextType::class,
                [
                    'label' => 'Label ',
                    'attr' => ['placeholder' => 'Label du genre'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer le label du genre.',
                        ]),
                    ]
                ]
            );
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GenderUser::class,
        ]);
    }
}
