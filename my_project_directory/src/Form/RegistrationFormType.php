<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Regex;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'Email',
                    'attr' => [
                        'placeholder' => 'Email'
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer votre email.',
                        ]),
                    ]
                ],
            )
            ->add(
                'userName',
                TextType::class,
                [
                    'label' => 'Nom d\' utilisateur',
                    'attr' => [
                        'placeholder' => 'Nom d\'utilisateur'
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer votre Nom d\'utilisateur.',
                        ]),
                    ]
                ],


            )
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre Nom.'

                    ]),
                    new Regex(
                        pattern: '/^\p{L}+([ \'-]\p{L}+)*$/u',
                        message: 'Lettres uniquement, avec espaces ou tirets entre les mots.'
                    )
                ]
            ])
            ->add(
                'firstName',
                TextType::class,
                [
                    'label' => 'Prénom',
                    'attr' => [
                        'placeholder' => 'Prénom'
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer votre Prénom.',
                        ]),
                        new Regex(
                            pattern: '/^[A-Za-zÀ-ÿ]+([ -][A-Za-zÀ-ÿ]+)*$/',
                            message: 'Lettres uniquement, avec espaces ou tirets entre les mots.'
                        )
                    ]
                ]
            )
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Accepter les conditions d’utilisation',
            'row_attr' => ['class' => 'agree'],
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos conditions.',
                    ]),
                ],
            ])
            ->add(
                'plainPassword',
                PasswordType::class,
                [
                    'label' => 'Mot de passe',

                    // instead of being set onto the object directly,
                    // this is read and encoded in the controller
                    'mapped' => false,
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'placeholder' => 'Mot de passe'
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrer le mot de passe.',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Your password should be at least {{ limit }} characters',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),

                    ],

                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
